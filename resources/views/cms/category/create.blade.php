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
                    <form action="{{ route('admin.category.store') }}" method="POST" class="col-md-10 mx-auto form-create">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">
                                    <label>Tên loại sản phẩm</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" placeholder="Nhập tên loại sản phẩm...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">
                                    <label style="margin-right: 2px;">Trạng thái</label>
                                </div>
                                <div class="col-md-8">
                                    @foreach(ActiveStatus::getValues() as $status)
                                        <span class="mr-2">
                                            <input {{ old('status') == $status || $status == 'active' ? "checked" : '' }} type="radio" name="status" value="{{ $status }}" >
                                            <label for="">@lang(ActiveStatus::getStatusName($status))</label>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">
                                    <label>Thuộc tính</label>
                                </div>
                                <div class="col-md-8">
                                    @foreach ($attributes as $attribute)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="{{ $attribute->id }}"
                                                    {{ old($attribute->id) ? 'checked' : '' }}>{{ $attribute->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div style="padding: 0.5rem!important;"></div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right"></div>
                                <div class="col-md-8">
                                    <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_category" style="float: left; margin-right: 2px;"/>
                                    <button class="btn btn-secondary btn-create-category-cancel" type="button">Hủy bỏ</button>
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
@endsection
