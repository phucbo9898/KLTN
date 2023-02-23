@extends('cms.layout.master')

@section('title', 'Chỉnh sửa danh mục')
<?php use App\Enums\ActiveStatus; ?>
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Cập nhật danh mục sản phẩm</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto">
                    @csrf
                    <div class="form-group">
                        <label>Tên loại sản phẩm: </label>
                        <input type="text" class="form-control" name="name"
                               value="{{ old('name', isset($category->name) ? $category->name : '') }}"
                               placeholder="Nhập tên loại sản phẩm...">
                    </div>
                    <div class="form-group">
                        <label style="margin-right: 2px;">Trạng thái: </label>
                        @foreach (ActiveStatus::getValues() as $status)
                            <span class="mr-2">
                                    <input @if (old('status') == $status || $status == $category->status) checked
                                           @endif type="radio" name="status" value="{{ $status }}"
                                           @if (old('status') == $status || $status == 'active') checked @endif>
                                    <label
                                        for="{{ ActiveStatus::getStatusName($status) }}">@lang(ActiveStatus::getStatusName($status))</label>
                                </span>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Thuộc tính: </label>
                        @foreach ($attributes as $attribute)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="{{ $attribute->id }}"
                                        {{ isset($arrayCategoryAttribute) ? (in_array($attribute->id, $arrayCategoryAttribute) ? 'checked' : '') : '' }}>{{ $attribute->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div style="padding: 0.5rem!important;"></div>
                    <input type="submit" value="Lưu thông tin" class="btn btn-success btn_save_category"
                           style="float: left; margin-right: 5px;"/>
                    <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">Hủy bỏ</a>
                    <div style="clear: both"></div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('javascript')
    <script>
        $(".btn_save_category").click(function (e) {
            e.preventDefault();
            form = $(this).parent('form').get(0);
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn sửa loại sản phẩm ID=" + {{ $category->id }} + " không ?",
                icon: "info",
                buttons: ["Không", {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: true,
                }],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị sửa loại sản phẩm mang ID =" +
                            {{ $category->id }} + " !", 'success').then(function () {
                            form.submit();
                        });
                    }
                });
        });
    </script>
@endsection
