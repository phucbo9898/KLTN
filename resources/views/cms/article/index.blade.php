@extends('cms.layout.master')

@section('title', 'Danh sách bài viết')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bài viết - Danh sách</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Bài viết - Danh sách</li>
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
                    @if (Session::has('create_article_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thành công !</strong> {{ Session::get('create_article_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('edit_article_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thành công !</strong> {{ Session::get('edit_article_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('delete_article_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thành công !</strong> {{ Session::get('delete_article_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-hover table-striped table-list" id="dataTable">
                        <thead class="thead-dark">
                            <th>ID</th>
                            <th>Tên bài viết</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td style="width:15%">{{ $article->name }}</td>
                                    <td><img style="width:80px;height:80px" src="{{ asset($article->image) }}"
                                            alt="No Avatar" /></td>
                                    <td>{{ $article->description }}</td>
                                    <td style="width: 11%; text-align: center"><a
                                            href="{{ route('admin.article.handle', ['status', $article->id]) }}"
                                            class="badge badge-{{ $article->status == 'active' ? 'success' : 'danger' }}">{{ $article->status == 'active' ? 'Công khai' : 'Riêng tư' }}</a>
                                    </td>
                                    <td style="width:11%">
                                        <input type="hidden" class="convert-time"
                                               value="{{ date('Y-m-d h:i:s A', strtotime($article->created_at ?? '')) }}">
                                        {{ $article->created_at ?? '' }}
                                    </td>
                                    <td style="width: 11%">
                                        <a href="{{ route('admin.article.edit', $article->id) }}"
                                            class="btn btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.article.handle', ['delete', $article->id]) }}"
                                            data-id="{{ $article->id }}"
                                            class="btn_delete_sweet btn btn-danger btn-circle"><i
                                                class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        $('.table-list').find('.convert-time').each(function() {
            var a = moment.tz($(this).val(), Intl.DateTimeFormat().resolvedOptions().timeZone)
            console.log(a)
            $(this).parent('td').html(a.format('YYYY-MM-DD HH:mm:ss'))
        });
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "Không có dữ liệu hiển thị trong bảng",
                    "info": "Đang hiển thị bản ghi _START_ đến _END_ trên _TOTAL_ bản ghi",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
                    "infoFiltered": "(đã lọc từ _MAX_ bản ghi)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "loadingRecords": "Đang tải...",
                    "processing": "Đang xử lý...",
                    "search": "Tìm kiếm:",
                    "zeroRecords": "Không có bản ghi nào được tìm thấy",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Tiếp",
                        "previous": "Trước"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });
        });
    </script>
    <script>
        $(".btn_delete_sweet").click(function(e) {
            e.preventDefault();
            url = $(this).attr('href');
            id = $(this).attr('data-id');
            swal({
                    title: "Bạn có chắc chắn?",
                    text: "Bạn có chắc chắn muốn xóa bài viết ID=" + id + " không ? ",
                    icon: "info",
                    buttons: ["Không", "Có"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị xóa bài viết mang ID =" + id + " !", 'success')
                            .then(function() {
                                window.location.href = url;
                            });
                    }
                });
        });
    </script>
@endsection
