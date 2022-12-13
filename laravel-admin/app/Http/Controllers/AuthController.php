<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::User();
            
             $user = User::create();
             $token = $user->createToken('admin')->accessToken;

            return [
                'token' => $token,
            ];
        }
        return response([
            'error' => 'Invalid Credential'
        ]);
    }
}
