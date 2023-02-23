@extends('cms.layout.master')

@section('title', 'Thêm mới bài viết')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới bài viết</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto" enctype="multipart/form-data">
                    @if (!$errors->articleErrors->isEmpty())
                        @foreach ($errors->articleErrors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $err }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    @include('cms.article.form')
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
