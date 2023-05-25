$(document).ready(function () {
    var value_create = $(".form-create").serialize();
    var value_update = $(".form-update").serialize();
    var msg_cancel = 'Bạn có chắc muốn hủy ? Dữ liệu đã nhập sẽ không được lưu ';

    $(".btn-create-slide-cancel").on('click', function () {
        let url_reload = "/admin/slide";
        let name = msg_cancel;
        let name_sceen = "Slide";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-create-category-cancel").on('click', function () {
        let url_reload = "/admin/category";
        let name = msg_cancel;
        let name_sceen = "Category";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-create-attribute-cancel").on('click', function () {
        let url_reload = "/admin/attribute";
        let name = msg_cancel;
        let name_sceen = "Attribute";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-create-product-cancel").on('click', function () {
        let url_reload = "/admin/product";
        let name = msg_cancel;
        let name_sceen = "Product";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-create-article-cancel").on('click', function () {
        let url_reload = "/admin/article";
        let name = msg_cancel;
        let name_sceen = "Article";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-create-user-cancel").on('click', function () {
        let url_reload = "/admin/user";
        let name = msg_cancel;
        let name_sceen = "User";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })
    $(".btn-create-voucher-cancel").on('click', function () {
        let url_reload = "/admin/voucher";
        let name = msg_cancel;
        let name_sceen = "Voucher";
        let get_value = $(".form-create").serialize();
        if (get_value != value_create) {
            cancel_create_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-voucher-cancel").on('click', function () {
        let url_reload = "/admin/voucher";
        let name = msg_cancel;
        let name_sceen = "Voucher";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-slide-cancel").on('click', function () {
        let url_reload = "/admin/slide";
        let name = msg_cancel;
        let name_sceen = "Slide";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-category-cancel").on('click', function () {
        let url_reload = "/admin/category";
        let name = msg_cancel;
        let name_sceen = "Category";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-attribute-cancel").on('click', function () {
        let url_reload = "/admin/attribute";
        let name = msg_cancel;
        let name_sceen = "Attribute";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-product-cancel").on('click', function () {
        let url_reload = "/admin/product";
        let name = msg_cancel;
        let name_sceen = "Product";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            console.log(get_value)
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-article-cancel").on('click', function () {
        let url_reload = "/admin/article";
        let name = msg_cancel;
        let name_sceen = "Article";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })

    $(".btn-update-user-cancel").on('click', function () {
        let url_reload = "/admin/user";
        let name = msg_cancel;
        let name_sceen = "User";
        let get_value = $(".form-update").serialize();
        if (get_value != value_update) {
            cancel_update_common(url_reload, name, name_sceen);
        } else {
            location.href = url_reload;
        }
    })
})

function cancel_create_common(url_reload, name, name_screen) {
    swal({
        title: "Bạn có chắc chắn?",
        text: name,
        icon: "info",
        buttons: ["Không", {
            text: "Đồng ý",
            value: true,
            visible: true,
            className: "bg-success",
            closeModal: true,
        }],
    }).then((willDelete) => {
        if (willDelete) {
            swal("Thành công", 'Hệ thống đang chuyển hướng về trang danh sách ' + name_screen + " !", 'success').then(function () {
                location.href = url_reload
            });
        }
    });
}

function cancel_update_common(url_reload, name, name_screen) {
    swal({
        title: "Bạn có chắc chắn?",
        text: name,
        icon: "info",
        buttons: ["Không", {
            text: "Đồng ý",
            value: true,
            visible: true,
            className: "bg-success",
            closeModal: true,
        }],
    }).then((isConfirm) => {
        if (isConfirm) {
            swal("Thành công", 'Hệ thống đang chuyển hướng về trang danh sách ' + name_screen + " !", 'success').then(function () {
                window.location.href = url_reload
            });
        }
    });
}
