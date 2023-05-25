@extends('cms.layout.master')

@section('title', 'Danh sách đánh giá sản phẩm')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Danh sách đanh giá sản phẩm</h3>
            </div>
            @if (isset($ratings))
                <div class="card-body">
                    <table class="table table-hover table-striped table-list" id="dataTable">
                        <thead class="thead-dark">
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">Người đánh giá</th>
                            <th style="width: 25%">Sản phẩm</th>
                            <th style="width: 30%">Nội dung</th>
                            <th style="width: 7%">Rating</th>
                            <th style="width: 13%">Ngày tạo</th>
                            <th style="width: 5%">Hành động</th>
                        </thead>
                        <tbody>
                            @foreach ($ratings as $rating)
                                <tr>
                                    <td>{{ $rating->id ?? '' }}</td>
                                    <td>{{ optional($rating->User)->name ?? '' }}</td>
                                    <td>{{ $rating->Product->name ?? '' }}</td>
                                    <td>{{ $rating->content ?? '' }}</td>
                                    <td style="text-align: center; width: 5%;">{{ $rating->number ?? '' }} sao</td>
                                    <td>
                                        <input type="hidden" class="convert-time"
                                               value="{{ date('Y-m-d h:i:s A', strtotime($rating->created_at ?? '')) }}">
                                        {{ $rating->created_at ?? '' }}
                                    </td>
                                    <td style="text-align: center; width: 10%;"><a
                                            href="{{ route('admin.comment.action', ['delete', $rating->id]) }}"
                                            class="btn_delete_sweet btn btn-danger btn-circle"
                                            data-id="{{ $rating->id }}"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('javascript')
    <script>
        $('.table-list').find('.convert-time').each(function () {
            var a = moment.tz($(this).val(), Intl.DateTimeFormat().resolvedOptions().timeZone)
            console.log(a)
            $(this).parent('td').html(a.format('YYYY-MM-DD HH:mm:ss'))
        });
        $(document).ready(function () {
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
        $(".btn_delete_sweet").click(function (e) {
            e.preventDefault();
            url = $(this).attr('href');
            id = $(this).attr('data-id');
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn có chắc chắn muốn xóa đánh giá ID=" + id + " không ?",
                icon: "info",
                buttons: ["Không", "Có"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Thành công", "Hệ thống chuẩn bị xóa đánh giá mang ID =" + id + " !", 'success')
                            .then(function () {
                                window.location.href = url;
                            });
                    }
                });
        });
    </script>
@endsection
