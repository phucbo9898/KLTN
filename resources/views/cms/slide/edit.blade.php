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
                <form action="{{ route('admin.slide.update', ['id' => $slide->id]) }}" method="POST" class="col-md-10 mx-auto form-update" id="form-update" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Ảnh mô tả</label>
                            </div>
                            <div class="col-md-8">
                                <img id="img_output" class="form-control" style="width:480px;height:360px; margin-bottom:10px"
                                     src="{{ asset($slide->image ?? '') }}"/>
                                <input type="file" id="img_input" class="form-control" name="image"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên Slide</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name') ?? ($slide->name ?? '') }}" placeholder="Nhập tên slide...">
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success" style="margin-right: 2px;">Lưu thông tin</button>
                                <button class="btn btn-secondary btn-update-slide-cancel" type="button">Hủy bỏ</button>
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
