<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\CustomerController;
use App\Models\Category;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $categories = Category::where('status', ActiveStatus::ACTIVE)->get();
        View::share('categories_search', $categories);
    }

    public function getRegister()
    {
        return view('fe.auth.register');
    }
    public function postRegister(Request $request)
    {
        try {
            DB::beginTransaction();
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
            $this->userRepo->create($register);
            DB::commit();
            return redirect()->back()->with('successregister', 'success');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::debug($exception->getMessage());
            return redirect()->back()->with('failedregister', 'error');
        }
    }
}
