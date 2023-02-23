@extends('cms.layout.master')

@section('title', 'Chỉnh sửa slide')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Cập nhật Slide</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên Slide: </label>
                        <input type="text" class="form-control" name="name"
                               value="{{ old('name') ?? ($slide->name ?? '') }}" placeholder="Nhập tên slide...">
                    </div>
                    <div class="form-group">
                        <label>Ảnh mô tả: </label>
                        <img id="img_output" class="form-control" style="width:480px;height:360px; margin-bottom:10px"
                             src="{{ asset($slide->image ?? '') }}"/>
                        <input type="file" id="img_input" class="form-control col-sm-4" name="image"/>
                    </div>
                    <div style="padding: 0.5rem!important;"></div>
                    <button type="submit" class="btn btn-success" style="float: left; margin-right: 5px;">Lưu thông tin</button>
                    <a class="btn btn-secondary" href="{{ route('admin.slide.index') }}">Hủy bỏ</a>
                    <div style="clear: both"></div>
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
        $(".btn_save_category").click(function (e) {
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
                            'success').then(function () {
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

                reader.onload = function (e) {
                    $('#img_output').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#img_input").change(function () {
            readURL(this);
        });
    </script>
@endsection
