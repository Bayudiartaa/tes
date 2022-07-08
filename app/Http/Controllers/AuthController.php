<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check() == true) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        if(Auth::check() == true)
        {
            return redirect()->back();
        }
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'username atau password salah!!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-index');
    }
}
