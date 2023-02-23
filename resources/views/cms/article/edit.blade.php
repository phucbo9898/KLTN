@extends('cms.layout.master')

@section('title', 'Chỉnh sửa bài viết')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Cập nhật bài viết</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto" enctype="multipart/form-data">
                    @if (!$errors->articleErrors->isEmpty())
                        @foreach ($errors->articleErrors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
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
@section('javascript2')
    <script>
        $(".btn_save_article").click(function (e) {
            e.preventDefault();
            form = $(this).parent('form').get(0);
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn sửa bài viết ID=" + {{ $article->id }} + " không ?",
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
                        swal("Thành công", "Hệ thống chuẩn bị sửa loại tin tức mang ID =" +
                            {{ $article->id }} + " !", 'success').then(function () {
                            form.submit();
                        });
                    }
                });
        });
    </script>
@endsection
