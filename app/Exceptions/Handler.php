<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /*
        if(strpos($request->getRequestUri(),'api/') !== false){
            if($exception instanceof ModelNotFoundException){
                return response()->json([
                    'message' => 'Data not found'
                ], 404);
            }

            if($exception instanceof NotFoundHttpException){
                return response()->json([
                    'message' => 'Resource not found'
                ], 404);
            }

            if($exception instanceof MethodNotAllowedHttpException){
                return response()->json([
                    'message' => 'Method not allowed'
                ], 404);
            }

            if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json([
                    'message' => 'Login Session is expired'
                ], 400);
            }

            if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'message' => 'You dont have access to access data'
                ], 400);
            }

            if($exception instanceof \Tymon\JWTAuth\Exceptions\JWTException){
                return response()->json([
                    'message' => 'No Session'
                ], 400);
            }
        }*/
        return parent::render($request, $exception);
    }
}
