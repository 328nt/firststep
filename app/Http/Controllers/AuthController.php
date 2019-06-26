<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password']; 
        if (Auth::attempt(['name' => $username, 'password' => $password]))
            {

                return view('users.complete', ['user'=>Auth::user()]);
            }
        else 
            {
            return view('users.login',['error'=>'login failed'] );
            }
    }

    public function logout()
    {
        Auth::logout();
        return view('users.login');
    }
}
