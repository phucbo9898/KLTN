@extends('cms.layout.master')

@section('title', 'Chỉnh sửa thuộc tính')
<?php use App\Enums\TypeAttribute; ?>
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Cập nhật thuộc tính</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.attribute.update', ['id' => $attribute->id]) }}" method="POST" class="col-md-10 mx-auto form-update" id="form-update">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên thuộc tính: </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name', isset($attribute->name) ? $attribute->name : '') }}"
                                       placeholder="Nhập tên thuộc tính...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Kiểu: </label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="type" id="selectForAttribute" value="{{ old('type') }}">
                                    @foreach(TypeAttribute::getValues() as $type)
                                        <option @if (old('type') == $type || $type == $attribute->type) selected
                                                @endif value="{{ $type }}">@lang(TypeAttribute::getTypeAttr($type))</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="textAreaForAttribute" style="display: none">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Giá trị (Các giá trị phân cách bằng dấu chấp phẩy( ; )):</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="5" name="value"
                                          id="contentTextAreaForAttribute">{{ isset($attribute) ? $attribute->value : '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_attribute"
                                       style="margin-right: 2px;"/>
                                <button class="btn btn-secondary btn-update-attribute-cancel" type="button">Hủy bỏ</button>
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
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('javascript')
    <script>
        $(function () {
            // change selected box
            $("#selectForAttribute").change(function () {
                //*get selected value
                var selected = $(this).children("option:selected").val();
                //*if value not equal(text;number;numberfloat) - display value textarea
                if (selected != "text" || selected != "number" || selected != "numberfloat") {
                    $("#textAreaForAttribute").css({
                        'display': ''
                    });
                }
                //*if value equal(text;number;numberfloat) - no display value textarea
                if (selected == "number" || selected == "text" || selected == "numberfloat") {
                    $("#textAreaForAttribute").css({
                        'display': 'none'
                    });
                    //**reset value textarea
                    $("#contentTextAreaForAttribute").val('');
                }
            });
            //check current selected of selectbox
            var curentSelectedForAttribute = $("#selectForAttribute").children("option:selected").val();
            //*if value not equal(text;number;numberfloat) - display value textarea
            if (curentSelectedForAttribute != "text" || curentSelectedForAttribute != "number" ||
                curentSelectedForAttribute != "numberfloat") {
                $("#textAreaForAttribute").css({
                    'display': ''
                });
            }
            //*if valuet equal(text;number;numberfloat) -  no display value textarea
            if (curentSelectedForAttribute == "number" || curentSelectedForAttribute == "text" ||
                curentSelectedForAttribute == "numberfloat") {
                $("#textAreaForAttribute").css({
                    'display': 'none'
                });
            }
        });
    </script>
@endsection
