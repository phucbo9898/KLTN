@extends('cms.layout.master')

@section('title', 'Chỉnh sửa slide')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Loại sản phẩm - Cập nhật</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Slide - Cập nhật</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" class="col-md-10 mx-auto" enctype="multipart/form-data">
                        @if (!$errors->slideErrors->isEmpty())
                            @foreach ($errors->slideErrors->all() as $err)
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
                            <label>Tên Slide: </label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name') ?? ($slide->name ?? '') }}" placeholder="Nhập tên slide...">
                        </div>
                        <div class="form-group">
                            <label>Ảnh mô tả: </label>
                            <img id="img_output" class="form-control" style="width:480px;height:360px; margin-bottom:10px"
                                src="{{ asset($slide->image ?? '') }}" />
                            <input type="file" id="img_input" class="form-control col-sm-4" name="image" />
                        </div>
                        <button type="submit" class="btn btn-success" style="float: right">Lưu thông tin</button>
                        <div style="clear: both"></div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('javascript2')
    <script>
        $(".btn_save_category").click(function(e) {
            e.preventDefault();
            form = $(this).parent('form').get(0);
            swal({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn có chắc chắn muốn sửa Slide ID=" + {{ $slide->id }} + " không ?",
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
                        swal("Thành công", "Hệ thống chuẩn bị sửa Slide mang ID =" + {{ $slide->id }} + " !",
                            'success').then(function() {
                            form.submit();
                        });
                    }
                });
        });
    </script>
@endsection
@section('javascript')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img_output').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#img_input").change(function() {
            readURL(this);
        });
    </script>
@endsection
