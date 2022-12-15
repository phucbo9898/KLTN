@csrf
<div class="form-group">
    <label>Tên loại sản phẩm: </label>
    <input type="text" class="form-control" name="name" value="{{old('name',isset($category->name)?$category->name:'')}}" placeholder="Nhập tên loại sản phẩm...">
</div>
<div class="form-group row">
    <label class="col-md-2">Trạng thái: </label>
    <div class="form-check  col-md-4">
        <input class="form-check-input" type="radio" name="status" value="1" {{isset($category->status)?(($category->status==1)?'checked':''):'checked'}}>
        <label class="form-check-label" for="status">
          Public
        </label>
      </div>
      <div class="form-check  col-md-4">
        <input class="form-check-input" type="radio" name="status" value="0" {{isset($category->status)?(($category->status==1)?'':'checked'):''}}>
        <label class="form-check-label" for="status">
          Private
        </label>
      </div>
</div>
<div class="form-group">
    <label>Thuộc tính: </label>
    @foreach($attributes as $attribute)
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="{{$attribute->id}}" {{isset($arrayCategoryAttribute)?((in_array($attribute->id,$arrayCategoryAttribute))?"checked":""):""}}>{{$attribute->name}}
      </label>
    </div>
    @endforeach
</div>
<input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_category" style="float: right"/>
<div style="clear: both"></div>
