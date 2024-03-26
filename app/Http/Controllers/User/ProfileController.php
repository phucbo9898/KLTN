<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $categories = Category::where('status', ActiveStatus::ACTIVE)->get();
        View::share('categories_search', $categories);

    }

    public function index() {
        $profile = Auth::user();
        return view('fe.profile.index', compact('profile'));
    }

    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->find($id);
            if (!$user) {
                return redirect()->route('profile.index')->with('error-user', __('The requested resource is not available'));
            }

            if (!empty($request->current_password) && !Hash::check($request->current_password, $user->password)) {
                return redirect()->route('profile.index')->with('error-password', __('Current password is incorrect'));
            }

            $data = $request->all();
            if (!empty($request['new_password'])) {
                $data['password'] = Hash::make($data['new_password']) ?? '';
            }

            unset($data['current_password']);
            unset($data['new_password']);

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
                $path_upload = 'upload/user/';
                $file->move($path_upload, $filename);
                $data['avatar'] = $path_upload . $filename;
            } else {
                $data['avatar'] = $user->avatar;
            }

            $result = $user->update($data);
            DB::commit();
            if ($result) {
                return redirect()->route('profile.index')->with('success', __('Updated successfully'));
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error-update', __('The Update failed'));
        }
    }
}
