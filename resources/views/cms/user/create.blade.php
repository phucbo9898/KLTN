@extends('cms.layout.master')

@section('title', 'Tạo mới thành viên')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới thành viên</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="POST" class="col-md-10 mx-auto form-create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Ảnh đại diện</label>
                            </div>
                            <div class="col-md-8">
                                <img id="img-preview" class="d-none" style="width:240px;height:180px; margin-bottom: 5px;">
                                <input id="upload-btn" type="file" class="form-control upload-file" name="image" style="height: calc(2.25rem + 4px) !important;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên thành viên</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập vào họ và tên">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Số điện thoại</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Nhập vào số điện thoại">
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn_save_user" value="Lưu thông tin" style="margin-right: 2px;"/>
                                <button class="btn btn-secondary btn-create-user-cancel" type="button">Hủy bỏ</button>
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
                $("#img-preview").removeClass('d-none')
                const image = document.getElementById('img-preview');
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
        })
    </script>
@endsection
