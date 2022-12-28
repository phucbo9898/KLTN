<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('fe.auth.register');
    }
    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != $request->confirmpassword)
        {
            return redirect()->back()->with('errorconfirmpassword','có lỗi');
        }
        $user->password= bcrypt($request->password);
        $user->save();
        if($user->id){
            return redirect()->back()->with('successregister','success');
        }
    }
}
