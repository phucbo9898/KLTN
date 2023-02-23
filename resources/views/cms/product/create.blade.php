@extends('cms.layout.master')

@section('title', 'Thêm mới sản phẩm')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới sản phẩm</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="mx-auto" enctype="multipart/form-data">
                    @if (!$errors->productErrors->isEmpty())
                        @foreach ($errors->productErrors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $err }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    @include('cms.product.form')
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
