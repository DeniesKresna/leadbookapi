<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\UserVerification;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends ApiController
{
    public function login()
    {
        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        if (! $token = auth()->attempt($credentials)) {
            request()->merge(["username" => request()->email]);
            $credentials = request(['username','password']);
            if (! $token = auth()->attempt($credentials)) {
                return self::error_response([],"login failed");
            }
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return self::success_response(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return self::success_response();
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return self::success_response([
            'access_token' => $token,
            'user' => auth()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(UserStoreRequest $request)
    {
        $validated = $request->validated();

        //accomodate all user request parameter, and hashing the password
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        //create the user by the container variable
        $user = User::create($data);
        if(!$user)
            return self::error_response([],"Cant register user. Please Try Again");

        //create user verify record by the user created above. set the unique code for authorizing.
        $user_pre_verifed_success = $this->pre_verify($user,"register");
        if(!$user_pre_verifed_success)
            return self::error_response([],"Cant register user. Please Try Again");

        return self::success_response([],"Success register your account. Please check your mail");
    }

    public function forget_password(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return self::error_response($validator->errors(),"",422);
        }
        $user = User::whereActive(1)->whereEmail($request->email)->first();
        if(!$user)
            return self::error_response([],"The email never register before");
        
        //create user verify record by the user created above. set the unique code for authorizing.
        $user_pre_verifed_success = $this->pre_verify($user,"forget-password");
        if(!$user_pre_verifed_success)
            return self::error_response([],"Cant register user. Please Try Again");

        return self::success_response([],"Success send change password link. Please check your mail");
    }

    public function reset_password(Request $request, $code){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return self::error_response($validator->errors(),"",422);
        }
        $now = date("Y-m-d H:i:s");
        $user_verify = UserVerify::where(["code"=>$code, "type"=>"forget-password"])
                        ->where('expired','>=',$now)->first();
        if(!$user_verify)
            return self::error_response([],"Cant change user password. Your link is not active or has been expired.");
        
        $user = $user_verify->user;
        $user->password = Hash::make($request->password);
        if($user->save()){
            $this->delete_user_verify($user->id, $user_verify->type);
            return self::success_response([],"Success change password");
        }
        return self::error_response([],"Cant change user password. Please Try Again");
    }

    public function verify($code){
        $user_verify = UserVerify::whereCode($code)->firstOrFail();
        if($user_verify->type == "register"){
            //only verify the user if the user inactive, and the verify code is not expired. 
            if($user_verify->user->active != 1 && strtotime($user_verify->expired) >= strtotime("now")){
                $user_verify->user->active = 1;
                $user_verify->user->save();

                //delete all user verify record refer to this user and same verificatio type for streamline the data
                $this->delete_user_verify($user_verify->user_id, $user_verify->type);

                return self::success_response([],"Success verifying mail. You can login now");
            }else{
                return self::error_response([],"No data");
            }
        }
    }

    public function check_reset_code($code){
        $user_verify = UserVerify::where(["code"=>$code, "type"=>"forget-password"])
                ->where('expired','>=','NOW()')->first();
        if($user_verify)
            return self::success_response();
        else
            return self::error_response([],"Your link never exist or has been expired");
    }

    private function delete_user_verify($user_id,$type){
        $user_verify = UserVerify::where(["user_id"=>$user_id,"type"=>$type])->delete();
    }

    private function pre_verify(User $user, $type){
        $user_verification_code = md5($user->email.$type.date("Y-m-d H:i:s").config("app.key"));
        $user_verify_data = [
            "code"=>$user_verification_code,
            'expired'=>date("Y-m-d H:i:s", strtotime("+2 hours")),
            'type'=>$type
        ];
        //update when model user and type match, or create whanever no data
        $user_verify = UserVerify::updateOrCreate(['user_id'=>$user->id,'type'=>$type],$user_verify_data);
        if(!$user_verify)
            return false;
        
        try{
            Notification::send($user, new UserVerification($user->name, $user_verification_code, $type));
            return true;
        }catch(Exception $e){
            $user_verify->delete();
            return false;
        }
        return true;
    }
}