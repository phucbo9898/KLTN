@extends('cms.layout.master')

@section('title', 'Thêm mới thuộc tính')
<?php use App\Enums\TypeAttribute; ?>
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới thuộc tính</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto">
                    @csrf
                    <div class="form-group">
                        <label>Tên thuộc tính: </label>
                        <input type="text" class="form-control" name="name"
                               value="{{ old('name') }}"
                               placeholder="Nhập tên thuộc tính...">
                    </div>
                    <div class="form-group ">
                        <label>Kiểu: </label>
                        <select class="form-control" name="type" id="selectForAttribute" value="{{ old('type') }}">
                            {{--        <option value="">@lang('Choose Type')</option> --}}
                            {{--        @foreach (\App\Enums\AttributeType::getValues() as $key => $value) --}}
                            {{--            --}}
                            {{--        @endforeach --}}
{{--                            <option--}}
{{--                                value="text" {{ isset($attribute) ? ($attribute->type == 'Text' ? 'selected' : '') : '' }}>--}}
{{--                                Text--}}
{{--                            </option>--}}
{{--                            <option--}}
{{--                                value="number" {{ isset($attribute) ? ($attribute->type == 'Number' ? 'selected' : '') : '' }}>--}}
{{--                                Number--}}
{{--                            </option>--}}
{{--                            <option--}}
{{--                                value="numberfloat" {{ isset($attribute) ? ($attribute->type == 'Number Float' ? 'selected' : '') : '' }}>--}}
{{--                                Number--}}
{{--                                Float--}}
{{--                            </option>--}}
{{--                            <option--}}
{{--                                value="select" {{ isset($attribute) ? ($attribute->type == 'Select' ? 'selected' : '') : '' }}>--}}
{{--                                Select--}}
{{--                            </option>--}}
                            {{-- <option value="checkbox"  {{isset($attribute)?(($attribute->at_type=="checkbox")?"selected":""):""}}>Checkbox</option>
                            <option value="radiobox"  {{isset($attribute)?(($attribute->at_type=="radiobox")?"selected":""):""}}>Radio box</option> --}}
                            <option value="">@lang('Choose Type Attribute')</option>
                            @foreach(TypeAttribute::getValues() as $type)
                                <option value="{{ $type }}"
                                @if ( old('type') == $type) {{ 'selected' }} @endif>
                                    @lang(TypeAttribute::getTypeAttr($type))
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="textAreaForAttribute" >
                        <label>Giá trị (Các giá trị phân cách bằng dấu chấp phẩy( ; )):</label>
                        <textarea class="form-control" rows="5" name="value"
                                  id="contentTextAreaForAttribute">{{ old('value') }}</textarea>
                    </div>
                    <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_attribute"
                           style="float: right"/>
                    <div style="clear: both"></div>
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
