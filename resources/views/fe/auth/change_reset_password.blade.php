@extends('fe.layout.master')
@section('content')
    <!-- Li's Breadcrumb Area End Here -->
    <div class="pt-60 pb-50">
        <h3 class="active" style="text-align: center">Đổi mật khẩu tài khoản của {{ $user->name }}</h3>
        <form class="col-6 mx-auto" method="POST">
            @if (!$errors->resetPasswordErrors->isEmpty())
                @foreach ($errors->resetPasswordErrors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $err }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
            @csrf
            <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" class="form-control" value="{{ $email }}" readonly />
            </div>
            <div class="form-group">
                <label>Mật khẩu mới: </label>
                <input type="password" name="passwordreset" class="form-control" />
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu: </label>
                <input type="password" name="confirm_passwordreset" class="form-control" />
            </div>
            <input type="submit" value="Đổi mật khẩu" class="btn btn-success col-4" style="float: right" />
            <div style="clear: both"></div>
        </form>
    </div>
@endsection
