<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\CustomerController;
use App\Models\Category;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $categories = Category::where('status', 'active')->get();
        View::share('categories_search', $categories);
    }

    public function getRegister()
    {
        return view('fe.auth.register');
    }
    public function postRegister(Request $request)
    {
        $data = $request->all();
        if ($data['password'] != $data['confirmpassword']) {
            return redirect()->back()->withInput()->with('errorconfirmpassword', 'có lỗi');
        }

        if ($request->hasFile('image')) {     // image
            $file = $request->file('image');
            $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
            $path_upload = 'upload/user/';
            $file->move($path_upload, $filename);
            $data['image'] = $path_upload . $filename;
        }
        $register = $this->userRepo->prepareRegister($data);
//        dd($register);
        $result = $this->userRepo->create($register);
//        dd($result);

        if ($result) {
            return redirect()->back()->with('successregister', 'success');
        }
    }
}
