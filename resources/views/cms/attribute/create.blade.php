@extends('cms.layout.master')

@section('title', 'Thêm mới thuộc tính')
<?php use App\Enums\TypeAttribute; ?>
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới thuộc tính</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Tên thuộc tính</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên thuộc tính...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Kiểu</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="type" id="selectForAttribute" value="{{ old('type') }}">
                                    <option value="">@lang('Choose Type Attribute')</option>
                                    @foreach(TypeAttribute::getValues() as $type)
                                        <option value="{{ $type }}"
                                        @if ( old('type') == $type) {{ 'selected' }} @endif>
                                            @lang(TypeAttribute::getTypeAttr($type))
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-none" id="textAreaForAttribute" >
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Giá trị (Các giá trị phân cách bằng dấu chấp phẩy( ; )):</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="5" name="value"
                                          id="contentTextAreaForAttribute">{{ old('value') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_attribute" style="margin-right: 2px;"/>
                                <a class="btn btn-secondary" href="{{ route('admin.attribute.index') }}">Hủy bỏ</a>
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
        $(function () {
            //check current selected of selectbox
            var curentSelectedForAttribute = $("#selectForAttribute").children("option:selected").val();
            //*if value not equal(text;number;numberfloat) - display value textarea
            if (curentSelectedForAttribute == 'select') {
                $("#textAreaForAttribute").removeClass('d-none')
            }
            //*if valuet equal(text;number;numberfloat) -  no display value textarea
            if (curentSelectedForAttribute != 'select') {
                $("#textAreaForAttribute").addClass('d-none')
            }

            // change selected box
            $("#selectForAttribute").change(function () {
                //*get selected value
                var selected = $(this).children("option:selected").val();
                //*if value is select - display value textarea
                if (selected == 'select') {
                    $("#textAreaForAttribute").removeClass('d-none')
                }
                //*if value not is select - no display value textarea
                if (selected != 'select') {
                    $("#textAreaForAttribute").addClass('d-none')
                    //**reset value textarea
                    $("#contentTextAreaForAttribute").val('');
                }
            });
        });
    </script>
@endsection
