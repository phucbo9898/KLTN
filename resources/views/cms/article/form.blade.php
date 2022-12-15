@csrf
<div class="form-group">
    <label>Tên Bài viết: </label>
    <input type="text" class="form-control" name="name" value="{{old('name',isset($article->name)?$article->name:'')}}" placeholder="Nhập tên bài viết...">
</div>
<div class="form-group">
    <label>Mô tả bài viết: </label>
    <textarea class="form-control" rows="3" name="description" placeholder="Nhập mô tả bài viết...">{{old('description',isset($article)?$article->description:"")}}</textarea>
</div>
<div class="form-group">
    <label>Ảnh mô tả: </label>
    @if(isset($article->image))
        <img  id="img_output" class="form-control" style="width:240px;height:180px; margin-bottom:10px" src="{{asset($article->image)}}"/>
    @else
        <img id="img_output" class="form-control" style="width:240px;height:180px; margin-bottom:10px" src="{{asset('unimg.jpg')}}"/>
    @endif
    <input type="file" id="img_input" class="form-control col-sm-4" name="image"/>
</div>
<div class="form-group">
  <label>Nội dung bài viết: </label>
  <textarea class="form-control" cols="30" rows="5"  name="content" id="ckeditor" placeholder="Nhập nội dung bài viết">{{old('content',isset($article)?$article->content:"")}}</textarea>
</div>
<input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_article" style="float: right"/>
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
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script>
      CKEDITOR.replace( 'ckeditor' );
  </script>
@endsection
