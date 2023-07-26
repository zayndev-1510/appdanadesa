<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;


use App\Http\Repository\admin\Loginrepository;
use App\Http\Requests\admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginControllerAdmin extends Controller
{
    protected $loginrepo;

    public function __construct(Loginrepository $loginRepository){
        $this->loginrepo=$loginRepository;
    }
    public function login(LoginRequest $loginRequest){
        return $this->loginrepo->loginUsers($loginRequest);
    }

    public function logout(){
        Auth::logout();
        return redirect("/");
    }
}
