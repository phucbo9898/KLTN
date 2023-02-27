<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends CustomerController
{
    //    use AuthenticatesUsers;
    public function getLogin()
    {
        if (Auth::check() == true) {
            return redirect()->route('home');
        }
        Session::put('url.intended',URL::previous());
        return view('fe.auth.login');
    }
    public function getLogout()
    {
        \Cart::destroy();
        Auth::logout();
        return redirect()->route('home');
    }
    public function postLogin(Request $request)
    {
        $infologin = $request->only('email', 'password');
        if (Auth::attempt($infologin)) {
            return Redirect::to(Session::get('url.intended'));
        } else {
            return redirect()->back()->with('errorlogin', 'Lỗi');
        }
    }
}
