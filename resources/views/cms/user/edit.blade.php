@extends('cms.layout.master')

@section('title', 'Chỉnh sửa người dùng')
<?php use App\Enums\ActiveStatus; ?>
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Chỉnh sửa người dùng</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST" class="col-md-10 mx-auto form-update" id="form-update" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Avatar</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <img src="{{ asset($user->avatar ?? '') }}" id="img-preview" style="width:240px;height:180px; margin-bottom: 5px;">
                                <input id="upload-btn" type="file" class="form-control upload-file" name="image" style="height: calc(2.25rem + 4px) !important;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên thành viên</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? ($user->name ?? '') }}" placeholder="Nhập vào họ và tên">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Email</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{ old('email') ?? ($user->email) }}" placeholder="Nhập email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Số điện thoại</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? ($user->phone) }}" placeholder="Nhập vào số điện thoại">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label style="margin-right: 2px;">Trạng thái</label>
                            </div>
                            <div class="col-md-8">
                                @foreach (ActiveStatus::getValues() as $status)
                                    <span class="mr-2">
                                        <input type="radio" name="status" value="{{ $status }}" {{ old('status', $user->status) == $status ? 'checked' : '' }}>
                                        <label for="{{ ActiveStatus::getStatusName($status) }}">@lang(ActiveStatus::getStatusName($status))</label>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn_save_user" value="Lưu thông tin" style="margin-right: 2px;"/>
                                <button class="btn btn-secondary btn-update-user-cancel" type="button">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $(document).on("change", "#upload-btn", function (e) {
                const image = document.getElementById('img-preview');
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
        })
    </script>
@endsection
