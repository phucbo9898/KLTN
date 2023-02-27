@extends('cms.layout.master')

@section('title', 'Thêm mới bài viết')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới bài viết</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.article.store') }}" method="POST" class="col-md-10 mx-auto form-create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên Bài viết</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên bài viết...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Ảnh mô tả</label>
                            </div>
                            <div class="col-md-8">
                                <img id="img_output" class="form-control d-none" src="{{ asset('unimg.jpg') }}" style="width:240px;height:180px; margin-bottom:10px"/>
                                <input type="file" id="img_input" class="form-control" name="image" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Mô tả bài viết</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" name="description" placeholder="Nhập mô tả bài viết...">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Nội dung bài viết</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" cols="30" rows="5" name="content" id="ckeditor" placeholder="Nhập nội dung bài viết">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_article" style="margin-right: 2px;"/>
                                <button class="btn btn-secondary btn-create-article-cancel" type="button">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
            $("#img_output").removeClass('d-none')
        });
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
