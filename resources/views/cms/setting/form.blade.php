@csrf
@method('GET')
<div class="form-group">
    <label>Tên công ty: </label>
	<input type="text" class="form-control" name="company" value="{{$setting->company}}">
</div>
<div class="form-group">
    <label>Địa chỉ: </label>
    <input type="text" class="form-control" name="address" value="{{$setting->address}}" >
</div>
<div class="form-group">
    <label>Thay đổi logo </label>
    <input type="file" class="form-control" name="new_image" value="" id="new_image"><br>
    @if ($setting->image)
        <img src="{{ asset($setting->image)}}" width="200" alt="">
    @endif
</div>
<div class="form-group">
    <label>Số điện thoại: </label>
    <input type="text" class="form-control" name="phone" value="{{$setting->phone}}">
</div>
<div class="form-group">
  <label>Email: </label>
  <input type="email" class="form-control" name="email" value="{{$setting->email}}">
</div>
<div class="form-group">
    <label>Facebook: </label>
    <input type="text" class="form-control" name="facebook" value="{{$setting->facebook}}">
</div>
<div class="form-group">
    <label>Website: </label>
    <input type="text" class="form-control" name="website" value="{{$setting->website}}">
</div>
<div class="form-group">
    <label>Giới thiệu về công ty: </label>
    <textarea name="introduce" id="editor1" class="form-control" rows="10">{{$setting->introduce}}</textarea>
</div>
<div class="form-group">
    <label>Chính sách bảo mật: </label>
    <textarea name="privacy_policy" id="editor2" class="form-control" rows="10">{{$setting->privacy_policy}}</textarea>
</div>
<input type="submit" class="btn btn-success btn_save_user" value="Lưu thông tin"/>

