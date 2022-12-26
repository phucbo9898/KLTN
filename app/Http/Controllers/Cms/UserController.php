<?php

namespace App\Http\Controllers\Cms;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    public function index()
    {
        $users = $this->userRepo->paginate(10);

        return view('cms.user.index', compact('users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users,email|min:3|max:255',
                'phone' => 'required|numeric'
            ],
            [
                'name.required' => 'Tên người dùng không được trống',
                'name.min' => 'Tên người dùng ít nhất 3 kí tự',
                'name.max' => 'Tên người dùng nhiều nhất nhất 255 kí tự',
                'email.required' => 'Email không được trống',
                'email.email' => 'Địa chỉ Email k đúng',
                'email.unique' => 'Đã có người đăng kí email này',
                'email.min' => 'Email ít nhất 3 kí tự',
                'email.max' => 'Email nhiều nhất nhất 255 kí tự',
                'phone.required' => 'Số điện thoại đang để trống!, vui lòng nhập số điện thoại',
                'phone.numeric' => 'Định dạng số điện thoại không đúng !',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'userErrors');
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
//        dd($user);
        $result = $this->userRepo->create($user);

        if ($result) {
            $request->session()->flash('create_user_success', 'Đã thêm 1 User!');
            return redirect()->route('admin.user.index');
        }
        $request->session()->flash('create_user_error', 'Thêm User không thành công');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
