<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends CustomerController
{
    //    use AuthenticatesUsers;
    public function getLogin()
    {
        return view('fe.auth.login');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }
    public function postLogin(Request $request)
    {
        $infologin = $request->only('email', 'password');
        if (Auth::attempt($infologin)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('errorlogin', 'Lỗi');
        }
    }
}
