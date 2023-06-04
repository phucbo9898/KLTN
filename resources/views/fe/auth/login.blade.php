@extends('fe.layout.master')
@section('content')
    @if (Session::has('email_not_exist'))
        <span class="check_email_exist" data-check="0"></span>
    @elseif(Session::has('email_exist'))
        <span class="check_email_exist" data-check="1"></span>
    @else
        <span class="check_email_exist" data-check="2"></span>
    @endif
    @if (Session::has('success_resetpassword'))
        <span class="success_resetpassword" data-check="1"></span>
    @endif
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 mx-auto">
        <!-- Login Form s-->
        <form method="POST">
            @csrf
            <div class="login-form">
                <h4 class="login-title">@lang('Login')</h4>
                @if (Session::has('errorlogin'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>@lang('Error')!</strong> @lang('Wrong account or password').
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('needLogin'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>@lang('Warning')!!!</strong> @lang('Need to login to use this function').
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error-email'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>@lang('Warning')!!!</strong> {{ Session::get('error-email') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 col-12 mb-20">
                        <label>Email <span style="color: red">*</span></label>
                        <input class="mb-0" type="email" name="email" placeholder="@lang('Enter your email address...')">
                    </div>
                    <div class="col-12 mb-20">
                        <label>@lang('Password') <span style="color: red">*</span></label>
                        <input class="mb-0 password" type="password" name="password" placeholder="@lang('Enter your password...')">
                        <br>
                        <div class="d-flex">
                            <div class="d-flex">
                                <input type="checkbox" id="showPassword" class="mb-0">
                                <label for="" class="mt-12 ml-2">@lang('Show password')</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                        <a href="#" data-toggle="modal" data-target="#reset_password"> @lang('Forgot password')?</a>
                    </div>
                    <div class="col-md-12">
                        <button class="register-button mt-0">@lang('Login')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Modal lấy lại mật khẩu --}}
    <div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="reset_password"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('Password retrieval')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.reset.password') }}" method="POST" id="form_reset_password">
                        @csrf
                        <div class="form-group">
                            <label> @lang('Password recovery email'): </label>
                            <input type="email" class="form-control" name="email_reset_password"
                                id="email_reset_password" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn btn-primary" id="btn_reset_password">@lang('Submit')</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Kết thúc modal lấy lại mật khẩu --}}
@endsection
@section('javascript')
    <script>
        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }
        $(function() {
            checksuccessresetpassword = $(".success_resetpassword").attr("data-check");
            if (checksuccessresetpassword == 1) {
                swal("@lang('Success') !", "@lang('You have successfully changed your password, please login') !", "success");
            }
            checkemail = $(".check_email_exist").attr("data-check");
            if (checkemail == 0) {
                swal("@lang('Email does not exist') !", "@lang('The email you just entered does not exist in the member list') !",
                    "error");
            } else if (checkemail == 1) {
                swal("@lang('Success') !", "@lang('Password reset link sent to your email') !", "success");
            }
            $("#btn_reset_password").click(function(event) {
                event.preventDefault();
                email_reset_password = $("#email_reset_password").val();
                if (email_reset_password == '') {
                    swal("@lang('Email input error')", "@lang('You need to enter your email to recover your password')", "error");
                } else if (IsEmail(email_reset_password) == false) {
                    swal("@lang('Email format error')", "@lang('You need to enter the correct email to recover your password')", "error");
                } else {
                    $("#form_reset_password").submit();
                }
            });
            $("#showPassword").click(function () {
                if ($(".password").attr('type') == 'password') {
                    $(".password").attr('type', 'text')
                } else {
                    $(".password").attr('type', 'password')
                }
            })
        });
    </script>
@endsection
