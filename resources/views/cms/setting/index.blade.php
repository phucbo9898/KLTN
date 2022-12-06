@extends('Admin.layout.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thiết lập website</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thiết lập</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.setting.update', $setting->id)}}" method="POST" class="col-md-10 mx-auto" enctype="multipart/form-data" role="form">
                
                @if(!$errors->settingErrors->isEmpty())
                @foreach($errors->settingErrors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{$err}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endforeach
                @endif
                @include('Admin.setting.form')
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
@section('my_js')
<script>
    $(function() {
        var _ckeditor = CKEDITOR.replace('editor1');
        _ckeditor.config.height = 600;  // Thiết lập chiều cao

        var _ckeditor = CKEDITOR.replace('editor2');
        _ckeditor.config.height = 600;  // Thiết lập chiều cao
    })
</script>