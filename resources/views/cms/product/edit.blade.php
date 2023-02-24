@extends('cms.layout.master')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Cập nhật sản phẩm</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" id="form-update" class="mx-auto" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Ảnh minh họa</label>
                            </div>
                            <div class="col-md-8">
                                <img id="img_output" style="width:240px;height:180px; margin-bottom:10px"
                                     src="{{ asset($product->image ?? '') }}"/>
                                <input type="file" name="image" id="img_input" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên sản phẩm</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name') ?? ($product->name ?? '') }}"
                                       placeholder="Nhập tên sản phẩm...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Loại sản phẩm</label>
                            </div>
                            <div class="col-md-8">
                                <select name="category_id" id="select_category_id" class="form-control"
                                        value="{{ old('category_id') }}">
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id || $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="attribute_for_product"></div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Giá sản phẩm</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="price"
                                       value="{{ old('price') ?? ($product->price ?? '') }}"
                                       placeholder="Nhập giá sản phẩm...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Giảm giá</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="sale"
                                       value="{{ old('sale') ?? ($product->sale ?? '') }}"
                                       placeholder="Giảm giá sản phẩm...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Nội dung sản phẩm</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="content" id="ckeditor" rows="5" class="form-control"
                                          placeholder="Nhập nội dung sản phẩm...">{{ old('content') ?? ($product->content ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_product"
                                       style="margin-right: 2px;"/>
                                <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">Hủy bỏ</a>
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
        $(".btn_save_product").click(function (e) {
            e.preventDefault();
            form = $(this).parent('form').get(0);
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn sửa sản phẩm ID=" + {{ $product->id }} + " không ?",
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
                        swal("Thành công", "Hệ thống chuẩn bị sửa sản phẩm mang ID =" + {{ $product->id }} +
                            " !", 'success').then(function () {
                            $("#form-update").submit();
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
    <script>
        $("#select_category_id").change(function() {
            var selected = $(this).children("option:selected").val();
            var url = "{{ route('admin.ajax.get.attribute') }}";
            if (selected != '') {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        category_id: selected
                    }
                }).done(function(result) {
                    $("#attribute_for_product").html('').append(result);
                });
            }
        });
        // get category current
        var valueCategoryCurrent = $("#select_category_id").children("option:selected").val();
        var url = "{{ route('admin.ajax.get.attribute') }}";
        var id = "{{ isset($product) ? $product->id : '0' }}"
        $.ajax({
            type: "GET",
            url: url,
            data: {
                category_id: valueCategoryCurrent,
                id: id

            }
        }).done(function(result) {
            $("#attribute_for_product").html('').append(result);
        });
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection

