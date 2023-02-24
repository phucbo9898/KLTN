@extends('cms.layout.master')

@section('title', 'Danh sách slide')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3>Danh sách Slide</h3>
            </div>
            @if (isset($slides))
                <div class="card-body">
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead class="thead-dark">
                        <th style="width: 5%; text-align: center;">ID</th>
                        <th style="width: 50%">Tên Slide</th>
                        <th style="width: 25%">Ảnh</th>
                        <th style="width: 15%">Hành động</th>
                        </thead>
                        <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($slides as $slide)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $stt++ }}</td>
                                <td>{{ $slide->name }}</td>
                                <td>
                                    @if ($slide->image)
                                        <img style="width:80px;height:80px" src="{{ asset($slide->image) }}"
                                             alt="No Avatar"/>
                                    @else
                                        <img style="width:80px;height:80px" src="{{ asset('noimg.png') }}"
                                             alt="No Avatar"/>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.slide.edit', $slide->id) }}"
                                       class="btn btn-success btn-circle"><i class="fas fa-edit"></i></a> &nbsp
                                    <a class="btn_delete_sweet btn btn-danger btn-circle"
                                       href="{{ route('admin.slide.handle', ['delete', $slide->id]) }}"
                                       data-id="{{ $slide->id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            @endif
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $("img").bind("error", function () {
                $(this).addClass('d-none');
            });
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
            })
        });
    </script>
    <script>
        $(".btn_delete_sweet").click(function (e) {
            e.preventDefault();
            url = $(this).attr('href');
            id = $(this).attr('data-id');
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn xóa Slide ID=" + id + " không ?",
                icon: "info",
                buttons: ["Không", "Có"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị slide mang ID =" + id + " !", 'success').then(
                            function () {
                                window.location.href = url;
                            });
                    }
                });
        });
    </script>
@endsection
