<?php
namespace App\Http\Repository\admin;
use App\Http\Requests\admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class Loginrepository
{
    /**
     * Summary of loginUsers
     * @param \App\Http\Requests\admin\LoginRequest $loginRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function loginUsers(LoginRequest $loginRequest){

        try {
            $infologin=$loginRequest->only("username","password");
            if(Auth::attempt($infologin)){
                $dashboard=getenv("URL_APP")."admin/dashboard";
                 return response()->json(["message"=>"login has success","success"=>true,'redirect'=>$dashboard,"role"=>Auth::user()->role],200);
            }
            return response()->json(["message"=>"Login has failed","success"=>false],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"Error ".$th->getMessage(),"success"=>false]);
        }
    }
}
