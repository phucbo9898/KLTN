@csrf
<div class="form-group">
    <label>Tên thuộc tính: </label>
    <input type="text" class="form-control" name="name"
           value="{{old('name',isset($attribute->name)?$attribute->name:'')}}"
           placeholder="Nhập tên thuộc tính...">
</div>
<div class="form-group ">
    <label>Kiểu: </label>
    <select class="form-control" name="type" id="selectForAttribute" value="{{old('type')}}">
        {{--        <option value="">@lang('Choose Type')</option>--}}
        {{--        @foreach(\App\Enums\AttributeType::getValues() as $key => $value)--}}
        {{--            --}}
        {{--        @endforeach--}}
        <option value="text" {{isset($attribute)?(($attribute->type=="Text")?"selected":""):""}}>Text</option>
        <option value="number" {{isset($attribute)?(($attribute->type=="Number")?"selected":""):""}}>Number
        </option>
        <option value="numberfloat" {{isset($attribute)?(($attribute->type=="Number Float")?"selected":""):""}}>
            Number
            Float
        </option>
        <option value="select" {{isset($attribute)?(($attribute->type=="Select")?"selected":""):""}}>Select
        </option>
        {{-- <option value="checkbox"  {{isset($attribute)?(($attribute->at_type=="checkbox")?"selected":""):""}}>Checkbox</option>
        <option value="radiobox"  {{isset($attribute)?(($attribute->at_type=="radiobox")?"selected":""):""}}>Radio box</option> --}}
    </select>
</div>
<div class="form-group" id="textAreaForAttribute" style="display: none">
    <label>Giá trị (Các giá trị phân cách bằng dấu chấp phẩy( ; )):</label>
    <textarea class="form-control" rows="5" name="value"
              id="contentTextAreaForAttribute">{{isset($attribute)?$attribute->value:""}}</textarea>
</div>
<input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_attribute" style="float: right"/>
<div style="clear: both"></div>
@section('javascript')
    <script>
        $(function () {
            // change selected box
            $("#selectForAttribute").change(function () {
                //*get selected value
                var selected = $(this).children("option:selected").val();
                //*if value not equal(text;number;numberfloat) - display value textarea
                if (selected != "text" || selected != "number" || selected != "numberfloat") {
                    $("#textAreaForAttribute").css({'display': ''});
                }
                //*if value equal(text;number;numberfloat) - no display value textarea
                if (selected == "number" || selected == "text" || selected == "numberfloat") {
                    $("#textAreaForAttribute").css({'display': 'none'});
                    //**reset value textarea
                    $("#contentTextAreaForAttribute").val('');
                }
            });
            //check current selected of selectbox
            var curentSelectedForAttribute = $("#selectForAttribute").children("option:selected").val();
            //*if value not equal(text;number;numberfloat) - display value textarea
            if (curentSelectedForAttribute != "text" || curentSelectedForAttribute != "number" || curentSelectedForAttribute != "numberfloat") {
                $("#textAreaForAttribute").css({'display': ''});
            }
            //*if valuet equal(text;number;numberfloat) -  no display value textarea
            if (curentSelectedForAttribute == "number" || curentSelectedForAttribute == "text" || curentSelectedForAttribute == "numberfloat") {
                $("#textAreaForAttribute").css({'display': 'none'});
            }
        });
    </script>
@endsection
