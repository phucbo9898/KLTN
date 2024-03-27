<?php

namespace App\Http\Controllers\Cms;

use App\Enums\ActiveStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UploadImageToFirebase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    private $userRepository;
    private $uploadImageToFirebase;

    public function __construct(
        UserRepository $userRepository,
        UploadImageToFirebase $uploadImageToFirebase,
    )
    {
        $this->userRepository = $userRepository;
        $this->uploadImageToFirebase = $uploadImageToFirebase;
    }

    public function getLogin()
    {
        return view('cms.login.login');
    }

    public function postLogin(Request $request)
    {
        $account = User::where('email', $request->email)->first();
        if ($account->status == ActiveStatus::INACTIVE) {
            return redirect()->back()->with('error', __('Your account has been deactivated.'));
        }
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role == UserType::ADMIN || $user->role == UserType::SYSTEMADMIN) {
                return redirect()->route('admin.home');
            }
        }
        return redirect()->back()->with('error', __('Đăng nhập không thành công'));
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $chart = chart();
        //number transaction handle
        $transaction_number = Transaction::where('status', 'pending')->count();
        //number products
        $number_products = Product::all()->count();
        //number user
        if (Auth::user()->isAdmin()) {
            $number_users = User::all()->count();
        } else {
            $number_users = User::where('role', UserType::USER)->get()->count();
        }
        //number articles
        $number_articles = Article::all()->count();
        // data transmission
        $data = [
            'time_chart' => $chart['time_chart'],
            'total_price_seven_days_edit' => $chart['total_price_seven_days_edit'],
            'transaction_number' => $transaction_number,
            'number_products' => $number_products,
            'number_users' => $number_users,
            'number_articles' => $number_articles
        ];
        return view('cms.dashbroad.index', $data);
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('cms.profile.profile', compact('profile'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->find($id);
            if (!$user) {
                return redirect()->back()->with('error', __('The requested resource is not available'));
            }

            if (!empty($request->current_password) && !Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', __('Current password is incorrect'));
            }

            $data = $request->all();
            if (!empty($request['new_password'])) {
                $data['password'] = Hash::make($data['new_password']) ?? '';
            }

            unset($data['current_password']);
            unset($data['new_password']);

            if (!empty($request->file('avatar'))) {
                $checkExtensionImage = checkExtensionImage($request->file('avatar'));
                if (!$checkExtensionImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            if ($request->hasFile('avatar')) {
                $imageUpload = $request->file('avatar');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['avatar'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_USER_COLLECTION'));
            } else {
                $data['avatar'] = $user->avatar;
            }

            $result = $user->update($data);
            DB::commit();
            if ($result) {
                return redirect()->route('admin.profile')->with('success', __('Updated successfully'));
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::debug($ex);
            return redirect()->back()->with('error', __('The Update failed'));
        }
    }
}
