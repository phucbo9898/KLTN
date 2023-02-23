@extends('cms.layout.master')

@section('title', 'Thêm mới danh mục')
<?php use App\Enums\ActiveStatus; ?>
@section('content')
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3>Thêm mới danh mục sản phẩm</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="col-md-10 mx-auto">
                        @csrf
                        <div class="form-group">
                            <label>Tên loại sản phẩm: </label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ old('name') }}" placeholder="Nhập tên loại sản phẩm...">
                        </div>
                        <div class="form-group">
                            <label style="margin-right: 2px;">Trạng thái: </label>
                            @foreach(ActiveStatus::getValues() as $status)
                                <span class="mr-2">
                                    <input {{ old('status') == $status || $status == 'active' ? "checked" : '' }} type="radio" name="status" value="{{ $status }}" >
                                    <label for="">@lang(ActiveStatus::getStatusName($status))</label>
                                </span>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>Thuộc tính: </label>
                            @foreach ($attributes as $attribute)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="{{ $attribute->id }}"
                                            {{ old($attribute->id) ? 'checked' : '' }}>{{ $attribute->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div style="padding: 0.5rem!important;"></div>
                        <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_category" style="float: left; margin-right: 5px;"/>
                        <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">Hủy bỏ</a>
                        <div style="clear: both"></div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
@endsection
