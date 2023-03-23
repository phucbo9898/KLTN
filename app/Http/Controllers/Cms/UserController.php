<?php

namespace App\Http\Controllers\Cms;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $options = $request->all();
        $users = $this->userRepo->query($options)->get();

        return view('cms.user.index', compact('users', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            if (!empty($request->file('image'))) {
                $extention = $request->file('image')->getClientOriginalExtension();
                if (!in_array(strtolower($extention), ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();
            $data['password'] = bcrypt(1);

            if ($request->hasFile('image')) {     // image
                $file = $request->file('image');
                $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
                $path_upload = 'upload/user/';
                $file->move($path_upload, $filename);
                $data['image'] = $path_upload . $filename;
            }
            $user = $this->userRepo->prepareUser($data);
            $this->userRepo->create($user);

            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Đã thêm 1 tài khoản người dùng với mật khẩu mặc định là "1" !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e);
            return redirect()->back()->with('error', 'Thêm User không thành công');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
        }
        return view('cms.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->userRepo->find($id);
            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
            }

            if (!empty($request->file('image'))) {
                $extention = $request->file('image')->getClientOriginalExtension();
                if (!in_array(strtolower($extention), ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->withInput()->with('error', __('Only PNG, JPEG and JPG files can be uploaded.'));
                }
            }

            $data = $request->all();

            if ($request->hasFile('image')) {     // image
                $file = $request->file('image');
                $filename = Carbon::now()->toDateString() . '_' . $file->getClientOriginalName();
                $path_upload = 'upload/user/';
                $file->move($path_upload, $filename);
                $data['image'] = $path_upload . $filename;
            } else {
                $data['image'] = $user->avatar;
            }
            $data['password'] = $user->password;
            $users = $this->userRepo->prepareUser($data);
            $this->userRepo->update($user->id, $users);

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
            $user = $this->userRepo->find($id);
            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', __('The requested resource is not available'));
            }
            if ($request->new_password != $request->confirm_password) {
                return response()->json([
                    'status' => 2
                ]);
            }
            $newPassword = bcrypt($request->new_password);
            $this->userRepo->update($id, ['password' => $newPassword]);
            return response()->json([
                'status' => 1
            ]);
        }
        dd("Looix");
    }

    public function action(Request $request, $action, $id)
    {
        $user = $this->userRepo->find($id);
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
