@extends('cms.layout.master')

@section('title', 'Chỉnh sửa người dùng')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Chỉnh sửa người dùng</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-10 mx-auto" enctype="multipart/form-data">
                    @if (!$errors->userErrors->isEmpty())
                        @foreach ($errors->userErrors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $err }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    @include('cms.user.form')
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
        $(".btn_save_user").click(function (e) {
            e.preventDefault();
            form = $(this).parent('form').get(0);
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn sửa tài khoản ID=" + {{ $user->id }} + " không ?",
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
                        swal("Vui lòng đợi chút", "Hệ thống check thông tin tài khoản mang ID =" +
                            {{ $user->id }} + " !", 'success').then(function () {
                            form.submit();
                        });
                    }
                });
        });
    </script>
@endsection
