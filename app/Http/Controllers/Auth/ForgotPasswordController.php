<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\CustomerController;
use App\Models\Category;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ForgotPasswordController extends Controller
{

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $categories = Category::where('status', 'active')->get();
        View::share('categories_search', $categories);
    }

    public function postResetPassword(Request $request)
    {
        $email = $request->email_reset_password;
        $checkUser = User::where('email', $email)->first();
        if (!$checkUser) {
            $request->session()->flash('email_not_exist', 'Email không tồn tại!');
            return redirect()->back();
        }
        $code = bcrypt(md5(time() . $email));
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('get.change.reset.password', ['code' => $checkUser->code, 'email' => $email]);
        $data = [
            'url' => $url
        ];
        Mail::send('fe.email.resetpassword', $data, function ($message) use ($email) {
            $message->from(env('MAIL_USERNAME'), 'Website bán linh kiện điện tử');
            $message->to($email)->subject('Lấy lại mật khẩu');
        });
        $request->session()->flash('email_exist', 'Email có tồn tại!');
        return redirect()->back();
    }
    public function getChangePasswordReset(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where(
            [
                'code' => $code,
                'email' => $email
            ]
        )->first();
        if (!$checkUser) {
            return redirect()->route('home');
        }
        $data = [
            'user' => $checkUser,
            'email' => $email
        ];
        return view('fe.auth.change_reset_password', $data);
    }
    public function postChangePasswordReset(Request $request)
    {
        $data = $request->all();
        $code = $data['code'];
        $email = $data['email'];
        $checkUser = User::where(['code' => $code, 'email' => $email])->first();

        if (!$checkUser) {
            return redirect()->route('home');
        }
        $validator = Validator::make(
            $request->all(),
            [
                'passwordreset' => 'required|min:3|max:33',
                'confirm_passwordreset' => 'required|same:passwordreset'
            ],
            [
                'passwordreset.required' => 'Bạn đã bỏ trống trường mật khẩu mới',
                'passwordreset.min' => 'Cần ít nhất 3 kí tự cho mật khẩu mới',
                'passwordreset.max' => 'Tối đa 33 kí tự cho mật khẩu mới',
                'confirm_passwordreset.required' => 'Bạn đã bỏ trống trường Nhập lại mật khẩu',
                'confirm_passwordreset.same' => 'Mật khẩu nhập lại không giống mật khẩu mới'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'resetPasswordErrors');
        }

        $changePasswordUser = $this->userRepo->prepareChangePassword($data);
        $result = $this->userRepo->update($checkUser->id, $changePasswordUser);

        if ($result) {
            $request->session()->flash('success_resetpassword', 'Đổi mật khẩu thành công!');
            return redirect()->route("get.login");
        }
    }
}
