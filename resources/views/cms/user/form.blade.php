@csrf
<div class="form-group">
    <label>Avatar:</label>
    <input type="file" class="form-control upload-file" name="image" style="height: calc(2.25rem + 4px) !important;">
</div>
<div class="form-group">
    <label>Tên thành viên: </label>
	<input type="text" class="form-control" name="name" value="{{old('name',isset($user->name)?$user->name:'')}}" placeholder="Nhập vào họ và tên">
</div>
<div class="form-group">
    <label>Email: </label>
    <input type="email" class="form-control" name="email" value="{{old('email',isset($user->email)?$user->email:'')}}" placeholder="Nhập email">
</div>
<div class="form-group">
  <label>Số điện thoại: </label>
  <input type="text" class="form-control" name="phone" value="{{old('phone',isset($user->phone)?$user->phone:'')}}" placeholder="Nhập vào số điện thoại">
</div>
<input type="submit" class="btn btn-success btn_save_user" value="Lưu thông tin"/>
