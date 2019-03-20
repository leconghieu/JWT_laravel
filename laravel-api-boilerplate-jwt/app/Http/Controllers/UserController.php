<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckLoginRequest;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;



class AccountController extends Controller
{
    public function checkSignUp(SignUpRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $signUp = User::create($data);
        if(!$signUp){
            return "Create fail";
        }
        return "success";
    }
    public function checkLogin(CheckLoginRequest $request)
    {
        $credentials = $data = $request->only(array_keys($request->rules()));
        $token = Auth::guard()->attempt($credentials);
        if(!$token) {
            return "fail";
        }
        return respone()->json([
            "status" => "ok",
            "token" => $token,
            'expires_in' => Auth::guard()->factory()->getTTL() * 60
        ]);

    }

}
