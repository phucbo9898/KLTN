@extends('cms.layout.master')

@section('title', 'Cập nhật mã giảm giá')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Cập nhật mã giảm giá</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.voucher.update', ['id' => $voucher->id]) }}" method="POST" class="col-md-10 mx-auto form-update" id="form-update" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Mã giảm giá</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="code" value="{{ old('code') ?? ($voucher->code ?? '') }}" placeholder="Nhập mã giảm giá">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Giảm giá</label>
                                <span style="color: red;">*</span>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="sale" value="{{ old('sale') ?? ($voucher->sale ?? '') }}" placeholder="Nhập giảm giá">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right">
                                <label>Ngày hết hạn</label>
                            </div>
                            <div class="col-md-8">
                                <input type="datetime-local" class="form-control" name="expire_date" value="{{ old('expire_date') ?? ($voucher->expire_date ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0.5rem!important;"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-right"></div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success btn_save_user" value="Lưu thông tin" style="margin-right: 2px;"/>
                                <button class="btn btn-secondary btn-update-voucher-cancel" type="button">Hủy bỏ</button>
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
@section('javascript')
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert-danger').remove();
            }, 3000)
        })
    </script>
@endsection
