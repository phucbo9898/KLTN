@extends('cms.layout.master')

@section('title', 'Chỉnh sửa người dùng')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Chỉnh sửa người dùng</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto" id="form-update" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Avatar:</label> <br>
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
                                <label>Tên thành viên: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? ($user->name ?? '') }}" placeholder="Nhập vào họ và tên">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Email: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{ old('email') ?? ($user->email) }}" placeholder="Nhập email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Số điện thoại: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? ($user->phone) }}" placeholder="Nhập vào số điện thoại">
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn_save_user" value="Lưu thông tin" style="margin-right: 2px;"/>
                                <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">Hủy bỏ</a>
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
@section('javascript2')
    <script>
        $(".btn_save_user").click(function (e) {
            e.preventDefault();
            form = $(this).parent('form').get(0);
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn sửa tài khoản ID=" + {{ $user->id }} + " không ?",
                icon: "info",
                buttons: ["Không", {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: true,
                }],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Vui lòng đợi chút", "Hệ thống check thông tin tài khoản mang ID =" +
                            {{ $user->id }} + " !", 'success').then(function () {
                            $("#form-update").submit();
                        });
                    }
                });
        });
    </script>
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
