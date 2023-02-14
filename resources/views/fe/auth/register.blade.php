@extends('fe.layout.master')
@section('content')
    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="login-form">
                <h4 class="login-title">@lang('Register')</h4>
                @if (Session::has('errorconfirmpassword'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Lỗi!</strong> Mật khẩu nhập lại không trùng nhau.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('successregister'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Thành công!</strong> Bạn đã đăng ký thành công !!!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 col-12 mb-20">
                        <label>@lang('Avatar')</label>
                        <img class="d-none" id="img-preview" style="width:240px;height:180px; margin-bottom: 5px;">
                        <input id="upload-btn" type="file" class="form-control" name="image" style="height: 50px;">
                    </div>
                    <div class="col-md-12 col-12 mb-20">
                        <label>@lang('Name') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="text" name="name" required placeholder="Nhập họ và tên của bạn..."
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>@lang('Email') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="email" name="email" required
                            placeholder="Nhập địa chỉ email của bạn..." value="{{ old('email') }}">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>@lang('Address') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="text" name="address" required
                               placeholder="Nhập địa chỉ của bạn..." value="{{ old('address') }}">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>@lang('Phone number') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="text" name="phone" required
                               placeholder="Nhập số điện thoại của bạn..." value="{{ old('phone') }}">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label>@lang('Password') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="password" name="password" required
                            placeholder="Nhập mật khẩu của bạn...">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label>@lang('Password confirmation') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="password" name="confirmpassword" required
                            placeholder="Nhập lại mật khẩu của bạn...">
                    </div>
                    <div class="col-12">
                        <button class="register-button mt-0">@lang('Register')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $(document).on("change", "#upload-btn", function (e) {
                $("#img-preview").removeClass('d-none')
                const image = document.getElementById('img-preview');
                console.log(image)
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
        })
    </script>
@endsection
