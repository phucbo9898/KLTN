<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Repositories\UserRepository;
use App\Services\UploadImageToFirebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
    }

    public function index(Request $request)
    {
        $options = $request->all();
        $users = $this->userRepository->query($options)->get();

        return view('cms.user.index', ['users' => $users, 'options' => $options]);
    }

    public function create()
    {
        return view('cms.user.create');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->file('image'))) {
                $checkExtensionImage = checkExtensionImage($request->file('image'));
                if (!$checkExtensionImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();

            if ($request->hasFile('image')) {
                $imageUpload = $request->file('image');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['image'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_USER_COLLECTION'));
            }
            $user = $this->userRepository->prepareUser($data);
            $this->userRepository->create($user);

            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Đã thêm 1 tài khoản người dùng với mật khẩu mặc định là "1" !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm User không thành công');
        }
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
        }
        return view('cms.user.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->userRepository->find($id);
            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
            }

            if (!empty($request->file('image'))) {
                $checkExtensionImage = checkExtensionImage($request->file('image'));
                if (!$checkExtensionImage) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();

            if ($request->hasFile('image')) {
                $imageUpload = $request->file('image');
                $convertImageToBase64 = 'data:' . $imageUpload->getMimeType() . ';base64,' . base64_encode(file_get_contents($imageUpload));
                $data['image'] = $this->uploadImageToFirebase->upload($convertImageToBase64, env('FIRE_BASE_UPLOAD_USER_COLLECTION'));
            } else {
                $data['image'] = $user->avatar ?? '';
            }
            $data['password'] = $user->password ?? '';
            $users = $this->userRepository->prepareUser($data);
            $this->userRepository->update($user->id, $users);

            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Đã sửa thành công user id số ' . $user->id . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->route('admin.user.index')->with('error', 'Sửa không thành công user id số ' . $user->id . '!');
        }
    }

    public function changePassword(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = $this->userRepository->find($id);
            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
            }
            if ($request->new_password != $request->confirm_password) {
                return response()->json([
                    'status' => 2
                ]);
            }
            $newPassword = bcrypt($request->new_password);
            $this->userRepository->update($id, ['password' => $newPassword]);
            return response()->json([
                'status' => 1
            ]);
        }
        dd("Looix");
    }

    public function action(Request $request, $action, $id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
        }

        switch ($action) {
            case 'delete':
                if ($id == 0) {
                    return redirect()->back();
                }
                $user->delete();
                $request->session()->flash('success', 'Đã xóa thành công tài khoản mang ID số ' . $id . '!');
                break;
//            case "role":
//                dump($user->role);die();
//                if ($user->role == 'admin') {
//                    $roleUser =
//                }
//                $user->role = $user->role == 'admin' ? 'user' : 'admin';
//                $user->save();
//                return redirect()->route('admin.user.index');
//                break;

            default:
                dd("Lỗi rồi");
                break;
        }
        return redirect()->route('admin.user.index');
    }
}
