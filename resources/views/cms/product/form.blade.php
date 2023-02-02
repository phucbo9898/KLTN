@csrf
<div class="row">
    <div class="col-md-8 pl-3 pr-3">
        <div class="form-group">
            <label>Tên sản phẩm: </label>
            <input type="text" class="form-control" name="name"
                value="{{ old('name', isset($product) ? $product->name : '') }}" placeholder="Nhập tên sản phẩm...">
        </div>
        <div class="form-group" style="display: none">
            <label>Mô tả sản phẩm: </label>
            <textarea name="description" placeholder="Nhập mô tả sản phẩm..." rows="3" class="form-control">{{ old('description', isset($product->description) ? $product->description : '') }}Bỏ qua</textarea>
        </div>
        <div class="form-group">
            <label>Nội dung sản phẩm: </label>
            <textarea name="content" id="ckeditor" rows="5" class="form-control" placeholder="Nhập nội dung sản phẩm...">{{ old('content', isset($product->content) ? $product->content : '') }}</textarea>
        </div>
        <div id="attribute_for_product">
        </div>
    </div>
    <div class="col-md-4 pl-3 pr-3">
        <div class="form-group">
            <label>Loại sản phẩm</label>
            <select name="category_id" id="select_category_id" class="form-control">
                <option value="">---------- Chọn loại sản phẩm ----------</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', isset($product->category_id) ? ($product->category_id == $category->id ? 'selected' : '') : '') }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Giá sản phẩm: </label>
            <input type="number" class="form-control" name="price"
                value="{{ old('price', isset($product->price) ? $product->price : '') }}" placeholder="Nhập giá sản phẩm...">
        </div>
        <div class="form-group">
            <label>Giảm giá: </label>
            <input type="number" class="form-control" name="sale"
                value="{{ old('sale', isset($product->sale) ? $product->sale : '') }}" placeholder="Giảm giá sản phẩm...">
        </div>
        <div class="form-group">
            <label>Ảnh minh họa:</label>
            @if (isset($product->image))
                <img id="img_output" style="width:240px;height:180px; margin-bottom:10px"
                    src="{{ asset($product->image) }}" />
            @else
                <img id="img_output" style="width:240px;height:180px; margin-bottom:10px"
                    src="{{ asset('unimg.jpg') }}" />
            @endif
            <input type="file" name="image" id="img_input" class="form-control" />
        </div>
    </div>
</div>
<input type="submit" value="Lưu thông tin" class="btn btn-success mr-3 btn_save_product" style="float: right" />
<div style="clear: both"></div>
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
