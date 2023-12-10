<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Session;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect ('/dashboard');

        }else{
            return view('auth.login');
        }
    }


public function actionLogin(Request $request)
{
    $credentials = $request->validate([ 
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (Auth::Attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    };

        Session::flash('error', 'Email atau Password Salah');
        return redirect('/login');
    }


public function actionLogout() {
    Auth::logout(); 
    return redirect ('/login');
}

}