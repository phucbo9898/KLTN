@extends('cms.layout.master')

@section('title', 'Thêm mới sản phẩm')
<?php

use \App\Enums\ActiveStatus;
use App\Enums\ActiveHot;

?>
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới sản phẩm</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="POST" class="mx-auto form-create"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Ảnh minh họa</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <img class="d-none" id="img_output" style="width:240px;height:180px; margin-bottom:10px"
                                     src="{{ asset('unimg.jpg') }}"/>
                                <input type="file" name="image" id="img_input" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên sản phẩm</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" placeholder="Nhập tên sản phẩm...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên đầy đủ</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name_full"
                                       value="{{ old('name_full') }}" placeholder="Nhập tên sản phẩm...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Loại sản phẩm</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <select name="category_id" id="select_category_id" class="form-control"
                                        value="{{ old('category_id') }}">
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach ($categories as $key => $category)
                                        <option
                                            value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
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
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                                       placeholder="Nhập giá sản phẩm...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Giảm giá</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="sale" value="{{ old('sale') }}"
                                       placeholder="Giảm giá sản phẩm...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Sản phẩm hot</label>
                            </div>
                            <div class="col-md-8">
                                @foreach (ActiveHot::getValues() as $hot)
                                    <span class="mr-2">
                                        <input id="{{ $hot }}"
                                               {{ old('hot') == $hot || $hot == ActiveHot::NO ? "checked" : '' }} type="radio"
                                               name="hot" value="{{ $hot }}">
                                        <label for="">@lang(ActiveHot::getHotName($hot))</label>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Nội dung sản phẩm</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <textarea name="content" id="ckeditor" rows="5" class="form-control"
                                          placeholder="Nhập nội dung sản phẩm...">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Trạng thái</label>
                            </div>
                            <div class="col-md-8">
                                @foreach (ActiveStatus::getValues() as $status)
                                    <span class="mr-2">
                                        <input id="{{ $status }}"
                                               {{ old('status') == $status || $status == ActiveStatus::ACTIVE ? "checked" : '' }} type="radio"
                                               name="status" value="{{ $status }}">
                                        <label for="">@lang(ActiveStatus::getStatusName($status))</label>
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
                                <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_product"
                                       style="margin-right: 2px;"/>
                                <button class="btn btn-secondary btn-create-product-cancel" type="button">Hủy bỏ
                                </button>
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
        $(document).ready(function () {
            $("#img_input").on("change", function () {
                $("#img_output").removeClass('d-none')
            })

            $("#select_category_id").change(function () {
                var selected = $(this).children("option:selected").val();
                var url = "{{ route('admin.ajax.get.attribute') }}";
                if (selected != '') {
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {
                            category_id: selected
                        }
                    }).done(function (result) {
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
            }).done(function (result) {
                $("#attribute_for_product").html('').append(result);
            });

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

            CKEDITOR.replace('ckeditor');
        })
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection
