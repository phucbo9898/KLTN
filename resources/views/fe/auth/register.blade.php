@extends('fe.layout.master')
@section('content')
    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 mx-auto">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="login-form">
                <h4 class="login-title">@lang('Register')</h4>
                @if (Session::has('errorconfirmpassword'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>@lang('Error')!</strong> @lang('Password and confirmation password do not match').
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('successregister'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>@lang('Success')!</strong> @lang('You have successfully registered') !!!
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
                        <input class="mb-0" type="text" name="name" required placeholder="@lang('Enter your first and last name...')"
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>@lang('Email') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="email" name="email" required
                            placeholder="@lang('Enter your email address...')" value="{{ old('email') }}">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>@lang('Address') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="text" name="address" required
                               placeholder="@lang('Enter your address...')" value="{{ old('address') }}">
                    </div>
                    <div class="col-md-12 mb-20">
                        <label>@lang('Phone Number') <span class="text-danger">*</span></label>
                        <input class="mb-0" type="text" name="phone" required
                               placeholder="@lang('Enter your phone number...')" value="{{ old('phone') }}">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label>@lang('Password') <span class="text-danger">*</span></label>
                        <div class="d-flex">
                            <input class="mb-0 input-password" type="password" name="password"  required
                                   placeholder="@lang('Enter your password...')">
                            <button type="button" class="input-group-text show-password fa fa-eye-slash"></button>
                        </div>
                    </div>
                    <div class="col-md-6 mb-20">
                        <label>@lang('Password confirmation') <span class="text-danger">*</span></label>
                        <div class="d-flex">
                            <input class="mb-0 input-password-confirm" type="password" name="confirmpassword" required
                                placeholder="@lang('Enter your password confirm...')">
                            <button type="button" class="input-group-text show-password-confirm fa fa-eye-slash"></button>
                        </div>
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
            $(".show-password").click(function () {
                $(".show-password").removeClass('fa-eye-slash')
                if ($(".input-password").attr('type') == 'password') {
                    $(".input-password").attr('type', 'text')
                    $(".show-password").removeClass('fa-eye-slash').addClass('fa-eye')
                } else {
                    $(".input-password").attr('type', 'password')
                    $(".show-password").removeClass('fa-eye').addClass('fa-eye-slash')
                }
            })
            $(".show-password-confirm").on("click", function () {
                if ($(".input-password-confirm").attr('type') == 'password') {
                    $(".input-password-confirm").attr('type', 'text')
                    $(".show-password-confirm").removeClass('fa-eye-slash').addClass('fa-eye')
                } else {
                    $(".input-password-confirm").attr('type', 'password')
                    $(".show-password-confirm").removeClass('fa-eye').addClass('fa-eye-slash')
                }
            })
            $("#upload-btn").on("change", function (e) {
                $("#img-preview").removeClass('d-none')
                const image = document.getElementById('img-preview');
                console.log(image)
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            })

        })
    </script>
@endsection
