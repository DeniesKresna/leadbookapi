<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends ApiController
{
    public function index()
    {
        $companies = Company::filter()->with('users')->paginate(10);
        return self::success_response($companies);
    }

    public function list(){
        $auth_id = auth()->user()->id;
        $companies = Company::whereHas('users', function($q) use($auth_id){
            $q->where("user_id",$auth_id);
        })->get();
        return self::success_response($companies);
    }

    public function store(CompanyStoreRequest $request)
    {
        $validated = $request->validated();

        $file_name = "companies/".$this->generate_link($request->name).".".$request->file('image')->extension();
        if(!Storage::disk('public_images')->put($file_name, file_get_contents($request->file('image')))){
            return self::error_response([],"Cant create company. Please Try Again");
        }

        $data = $request->all();
        $data['image'] = $file_name;
        $company = Company::create($data);
        if(!$company)
            return self::error_response([],"Cant create company. Please Try Again");
        
        return self::success_response([],"Success create a company");
    }

    public function delete($id)
    {
        $company = Company::find($id);
        if(!$company)
            return self::error_response([],"Cant delete company. Please Try Again");
        $file_name = $company->image;
        if($company->delete()){
            Storage::disk('public_images')->delete($file_name);
        }
        return self::success_response([],"Success delete a company");
    }

    public function update_favourite(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return self::error_response($validator->errors(),"",422);
        }
        $company = Company::find($id);
        if(!$company)
            return self::error_response([],"Cant make this company favourite. Please Try Again");
        
        $auth_id = auth()->user()->id;
        $connected = $company->users()->where('user_id',$auth_id)->exists();
        $status_string = "add";
        
        if($connected){
            if(!$request->status){
                $status_string = "remove";
                $company->users()->detach($auth_id);
            }
        }else{
            if($request->status){
                $company->users()->attach($auth_id);
            }
        }
        return self::success_response([],"Success ".$status_string." ".$company->name." as one of favourites.");
    }

    private function generate_link($str){
        $str = trim($str);
        return str_replace(" ","-",$str);
    }
}