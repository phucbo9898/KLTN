<?php

namespace App\Http\Controllers\User;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\UserRepository;
use App\Services\UploadImageToFirebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    private $userRepository;
    private $uploadImageToFirebase;

    public function __construct(
        UserRepository $userRepository,
        UploadImageToFirebase $uploadImageToFirebase
    )
    {
        $this->userRepository = $userRepository;
        $this->uploadImageToFirebase = $uploadImageToFirebase;
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
                return redirect()->route('profile.index')->with('success', __('Updated successfully'));
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error-update', __('The Update failed'));
        }
    }
}
