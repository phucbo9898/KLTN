@extends('fe.layout.master')
@section('content')
    <input type="hidden" class="order-id-momo" value="">
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li class="active">@lang('Order confirmation')</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    @if (session()->get('success'))
                        <x-alert type="success" class="header-message">
                            {{ session()->get('success') }}
                        </x-alert>
                    @endif
                    @if (session()->get('error'))
                        <x-alert type="danger" class="header-message">
                            {{ session()->get('error') }}
                        </x-alert>
                    @endif
                    <form method="POST" id="formSaveInfo">
                        @csrf
                        <div class="checkbox-form">
                            <h3>@lang('Transaction details')</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>@lang('Name') <span class="required">*</span></label>
                                        <input placeholder="@lang('Enter your name')" type="text" name="name" id="check_name"
                                            value="{{ old('name') ?? Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>@lang('Address') <span class="required">*</span></label>
                                        <input placeholder="@lang('Enter your address')" name="address"
                                            id="check_address" required type="text" value="{{ old('address') ?? Auth::user()->address }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" name="email" type="email">
                                </div>
                            </div> --}}
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>@lang('Phone Number') <span class="required">*</span></label>
                                        <input name="phone" type="text" id="check_phone"
                                            placeholder="@lang('Enter your phone number')" value="{{ old('phone') ?? Auth::user()->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="checkout-form-list">
                                            <label>@lang('Note')</label>
                                            <textarea id="checkout-mess" name="note" cols="30" rows="10" required placeholder="@lang('Enter your note')">{{ old('note') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="type-payment" name="type_payment" value="">
                        <input type="hidden" id="status-payment" name="status_payment" value="">
                        @if(session()->has('coupon'))
                            <input type="hidden" name="price" value="{{ str_replace('.', '', \Cart::subtotal(0, ',', '.')) * (100 - session()->get('coupon')->sale) / 100 }}">
                        @endif
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>@lang('Your cart'): </h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">@lang('Product')</th>
                                        <th class="cart-product-total">@lang('Price')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="cart_item">
                                            <td class="cart-product-name"> {{ $product->name }}<strong
                                                    class="product-quantity"> × {{ $product->qty }}</strong></td>
                                            <td class="cart-product-total"><span
                                                    class="amount">{{ number_format($product->price * $product->qty, 0, ',', ',') }}
                                                    @lang('VND')</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>@lang('Tổng tiền')</th>
                                        <td>
                                            <span class="amount">
                                                @if(session()->has('coupon'))
                                                    {{ \Cart::subtotal(0, ',', ',')  }} @lang('VND')
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    @if(session()->has('coupon'))
                                        <tr class="fs-15 amount">
                                            <td class="cart-product-name">Mã giảm giá:</td>
                                            <td class="cart-product-total">{{ session()->get('coupon')->code . " (" . session()->get('coupon')->sale. "%" . ")" }}</td>
                                        </tr>
                                        <tr class="fs-15 amount">
                                            <td class="cart-product-name">Tổng tiền sau giảm giá:</td>
                                            <td class="cart-product-total">
                                                {{ number_format(str_replace('.', '', \Cart::subtotal(0, ',', '.')) * (100 - session()->get('coupon')->sale) / 100) }} @lang('VND')
                                            </td>
                                        </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method" style="margin-top: 0px !important;">
{{--                                                        @dd($payment['resultCode'] ?? '')--}}
{{--                            @if(isset($payment['resultCode']) && ($payment['resultCode'] == 1))--}}
{{--                                @if()--}}
{{--                                    <button class="btn btn-info d-none" type="submit" style="width: 212px; height: 50px; margin-bottom: 5px;" data-toggle="modal" data-target="#exampleModalBanking">Chuyển khoản</button>--}}
{{--                                    <form action="{{ route('shopping.payment-momo') }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" class="total-momo" name="total_momo" value="{{ \Cart::subtotal(0, ',', '') }}">--}}
{{--                                        <button class="btn btn-warning d-none" style="width: 212px; height: 50px; margin-bottom: 5px;" name="payUrl">Thanh toán bằng Momo</button>--}}
{{--                                    </form>--}}
{{--                                    <div class="order-button-payment d-none">--}}
{{--                                        <button class="btn btn-primary" type="submit" id="submitFormSaveInfo" style="width: 212px; height: 50px;">Thanh toán khi nhận hàng</button>--}}
{{--                                    </div>--}}
{{--                                    <div class="order-button-payment">--}}
{{--                                        <span style="color:#1cc88a; font-size: 18px;"><i class="fa fa-check-circle-o"></i>&ensp;Đã thanh toán</span> <br>--}}
{{--                                        <button class="btn btn-primary" type="submit" id="submitFormSaveInfoPayment" style="width: 212px; height: 50px;margin-top: 5px;">Đặt hàng</button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <h5>Chọn phương thức thanh toán</h5>--}}
{{--                                <div class="order-button-payment">--}}
{{--                                    <input type="radio" name="payment" id="banking" value="banking" style="width: 15px; height: 13px; margin-bottom: 5px;">--}}
{{--                                    <label>Chuyển khoản</label> <br>--}}
{{--                                    <button class="btn btn-info banking-payment" type="submit" style="width: 212px; height: 50px; margin-bottom: 5px;" data-toggle="modal" data-target="#exampleModalBanking">Chuyển khoản</button>--}}
{{--                                    <img class="banking-payment" src="{{ asset('banking.jpg') }}" style="width: 300px;">--}}
{{--                                </div>--}}
{{--                                <div class="order-button-payment">--}}
{{--                                    <input type="radio" name="payment" id="momo" value="momo" style="width: 15px; height: 13px; margin-bottom: 5px;">--}}
{{--                                    <label>Thanh toán bằng Momo</label>--}}
{{--                                    <form action="{{ route('shopping.payment-momo') }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" class="name" name="name" value="">--}}
{{--                                        <input type="hidden" class="address" name="address" value="">--}}
{{--                                        <input type="hidden" class="phone-number" name="phone_number" value="">--}}
{{--                                        <input type="hidden" class="note" name="note" value="">--}}
{{--                                        <input type="hidden" class="total-momo" name="total_momo" value="{{ \Cart::subtotal(0, ',', '') }}">--}}
{{--                                        <button class="btn btn-warning momo-payment" style="width: 212px; height: 50px; margin-bottom: 5px;" name="payUrl">Thanh toán bằng Momo</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="order-button-payment">--}}
{{--                                    <input type="radio" name="payment" id="payment" value="payment" style="width: 15px; height: 13px; margin-bottom: 5px;">--}}
{{--                                    <label>Thanh toán khi nhận hàng</label> <br>--}}
{{--                                    <button class="btn btn-primary payment-normal" type="submit" id="submitFormSaveInfo" style="width: 212px; height: 50px;">Đặt hàng</button>--}}
{{--                                </div>--}}
{{--                            @endif--}}

                            <h5>@lang('Select a payment method')</h5>
                            <div class="order-button-payment">
                                <input type="radio" name="payment" id="vnpay" value="vnpay" style="width: 15px; height: 13px; margin-bottom: 5px;">
                                <label>@lang('Payment with VNPay')</label>
                                <form action="{{ route('shopping.payment-vnpay') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="name" name="name" value="">
                                    <input type="hidden" class="address" name="address" value="">
                                    <input type="hidden" class="phone-number" name="phone_number" value="">
                                    <input type="hidden" class="note" name="note" value="">
                                    <input type="hidden" class="type-payment" name="type_payment" value="">
                                    <input type="hidden" class="total-momo" name="total_money" value="{{ \Cart::subtotal(0, ',', '') }}">
                                    <button class="btn btn-danger payment-vnpay d-none" type="submit" name="redirect" style="width: 212px; height: 50px;">@lang('Order')</button>
                                </form>
                            </div>
                            <div class="order-button-payment {{ Cart::subtotal(0, ',', '') > 30000000 ? 'd-none' : '' }}">
                                <input type="radio" name="payment" id="momo" value="momo" style="width: 15px; height: 13px; margin-bottom: 5px;">
                                <label>@lang('Payment with Momo')</label> <br>
                                <form action="{{ route('shopping.payment-momo') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="name" name="name" value="">
                                    <input type="hidden" class="address" name="address" value="">
                                    <input type="hidden" class="phone-number" name="phone_number" value="">
                                    <input type="hidden" class="note" name="note" value="">
                                    <input type="hidden" class="type-payment" name="type_payment" value="">
                                    @if(session()->has('coupon'))
                                        <input type="hidden" class="total-momo" name="total_momo" value="{{ str_replace('.', '', \Cart::subtotal(0, ',', '.')) * (100 - session()->get('coupon')->sale) / 100 }}">
                                    @else
                                        <input type="hidden" class="total-momo" name="total_momo" value="{{ \Cart::subtotal(0, ',', '') }}">
                                    @endif
                                    <button class="btn btn-warning payment-momo d-none" style="width: 212px; height: 50px; margin-bottom: 5px;" name="payUrl">@lang('Order')</button>
                                </form>
                            </div>
                            <div class="order-button-payment">
                                <input type="radio" name="payment" id="normal" value="normal" style="width: 15px; height: 13px; margin-bottom: 5px;">
                                <label>@lang('Payment on delivery')</label>
                            </div>
                            <button class="btn btn-primary payment-normal d-none" type="submit" id="submitFormSaveInfo" style="width: 212px; height: 50px;">@lang('Order')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalBanking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản ngân hàng của shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('banking.jpg') }}" alt="" style="width: 465px;">
                </div>
            </div>
        </div>
    </div>
    <!--Checkout Area End-->
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $(".name").val($("#check_name").val())
            $(".address").val($("#check_address").val())
            $(".phone-number").val($("#check_phone").val())

            $("#check_name").on("change", function () {
                $(".name").val($("#check_name").val())
            })
            $("#check_address").on("change", function () {
                $(".address").val($("#check_address").val())
            })
            $("#check_phone").on("change", function () {
                $(".phone-number").val($("#check_phone").val())
            })
            $("#checkout-mess").on("change", function () {
                $(".note").val($("#checkout-mess").val())
            })

            // console.log($("input[name=payment]:checked").val())
            // if ($("input[name=payment]:checked").val() == '' || $("input[name=payment]:checked").val() == undefined) {
            //     $(".banking-payment").addClass('d-none')
            //     $(".momo-payment").addClass('d-none')
            // }
            // $("input[name=payment]").on("change", function() {
            //     if ($("input[name=payment]:checked").val() == '' || $("input[name=payment]:checked").val() == undefined) {
            //         $(".banking-payment").addClass('d-none')
            //         $(".momo-payment").addClass('d-none')
            //     } else if ($("input[name=payment]:checked").val() == 'banking') {
            //         $(".banking-payment").removeClass('d-none')
            //         $(".momo-payment").addClass('d-none')
            //     } else if ($("input[name=payment]:checked").val() == 'momo') {
            //         $(".banking-payment").addClass('d-none')
            //         $(".momo-payment").removeClass('d-none')
            //         $(".payment-normal").addClass('d-none')
            //     }
            // })

            $(".payment-momo").on("click", function() {
                check_name = $("#check_name").val();
                check_address = $("#check_address").val();
                check_phone = $("#check_phone").val();
                check_note = $("#checkout-mess").val();
                if (!check_name || !check_address || !check_phone || !check_note) {
                    // swal("Thành công","Thanh toán không thành công","success");
                    swal("Cảnh báo",
                        "Yêu cầu bạn nhập dữ liệu đầy đủ để dễ dàng vận chuyển hàng ! Xin cảm ơn đã sử dụng dịch vụ của chúng tôi!",
                        "warning");
                    return false;
                }
            })

            $(".payment-vnpay").on("click", function() {
                check_name = $("#check_name").val();
                check_address = $("#check_address").val();
                check_phone = $("#check_phone").val();
                check_note = $("#checkout-mess").val();
                if (!check_name || !check_address || !check_phone || !check_note) {
                    // swal("Thành công","Thanh toán không thành công","success");
                    swal("Cảnh báo",
                        "Yêu cầu bạn nhập dữ liệu đầy đủ để dễ dàng vận chuyển hàng ! Xin cảm ơn đã sử dụng dịch vụ của chúng tôi!",
                        "warning");
                    return false;
                }
            })

            if ($("input[name=payment]:checked").val() == 'vnpay') {
                $(".payment-normal").addClass('d-none')
                $(".payment-momo").addClass('d-none')
                $(".payment-vnpay").removeClass('d-none')
            } else if ($("input[name=payment]:checked").val() == 'momo') {
                $(".payment-momo").removeClass('d-none')
                $(".payment-normal").addClass('d-none')
                $(".payment-vnpay").addClass('d-none')
            } else if ($("input[name=payment]:checked").val() == 'normal') {
                $(".payment-normal").removeClass('d-none')
                $(".payment-momo").addClass('d-none')
                $(".payment-vnpay").addClass('d-none')
            }

            $("input[name=payment]").on("change", function() {
                if ($("input[name=payment]:checked").val() == 'vnpay') {
                    $(".payment-vnpay").removeClass('d-none')
                    $(".payment-normal").addClass('d-none')
                    $(".payment-momo").addClass('d-none')
                    $(".type-payment").val('vnpay')
                } else if ($("input[name=payment]:checked").val() == 'momo') {
                    $(".payment-momo").removeClass('d-none')
                    $(".payment-normal").addClass('d-none')
                    $(".payment-vnpay").addClass('d-none')
                    $(".type-payment").val('momo')
                } else if ($("input[name=payment]:checked").val() == 'normal') {
                    $(".payment-normal").removeClass('d-none')
                    $(".payment-momo").addClass('d-none')
                    $(".payment-vnpay").addClass('d-none')
                    $(".type-payment").val('normal')
                }
            })
            $("#submitFormSaveInfo").click(function() {
                $("#type-payment").val('normal')
                check_name = $("#check_name").val();
                check_address = $("#check_address").val();
                check_phone = $("#check_phone").val();
                check_note = $("#checkout-mess").val();
                if (!check_name || !check_address || !check_phone || !check_note) {
                    // swal("Thành công","Thanh toán không thành công","success");
                    swal("@lang('Warning')",
                        "@lang('Requires you to enter complete data for easy shipping ! Thank you for using our service!')",
                        "warning");
                } else {
                    swal({
                            title: "@lang('Are you sure')?",
                            text: "@lang('The products in your cart will be paid ! The products will wait for the shop side to check and send for you')",
                            icon: "info",
                            buttons: ["@lang('No')", {
                                text: "@lang('Yes')",
                                value: true,
                                visible: true,
                                className: "bg-success",
                                closeModal: true
                            }],
                            successMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal("@lang('Success')",
                                    "@lang('Your order has been successfully placed! Thank you for using our service!')",
                                    'success').then(function() {
                                    $("#formSaveInfo").submit();
                                });
                            }
                        });
                }
            });
            // $("#submitFormSaveInfoPayment").click(function() {
            //     // $("#status-payment").val('Paуment received')
            //     // $("#type-payment").val('Paуment Momo')
            //     check_name = $("#check_name").val();
            //     check_address = $("#check_address").val();
            //     check_phone = $("#check_phone").val();
            //     check_note = $("#checkout-mess").val();
            //     if (!check_name || !check_address || !check_phone || !check_note) {
            //         // swal("Thành công","Thanh toán không thành công","success");
            //         swal("Cảnh báo",
            //             "Yêu cầu bạn nhập dữ liệu đầy đủ để dễ dàng vận chuyển hàng ! Xin cảm ơn đã sử dụng dịch vụ của chúng tôi!",
            //             "warning");
            //     } else {
            //         swal({
            //             title: "Bạn có chắc chắn?",
            //             text: "Các sản phẩm trong giỏ hàng của bạn sẽ được thanh toán ! Các sản phẩm sẽ đợi bên của hàng kiểm tra và gửi về",
            //             icon: "info",
            //             buttons: ["Không", {
            //                 text: "Đồng ý",
            //                 value: true,
            //                 visible: true,
            //                 className: "bg-success",
            //                 closeModal: true
            //             }],
            //             successMode: true,
            //         })
            //             .then((willDelete) => {
            //                 if (willDelete) {
            //                     swal("Thành công",
            //                         "Bạn đã đặt hàng thành công ! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !",
            //                         'success').then(function() {
            //                         $("#formSaveInfo").submit();
            //                     });
            //                 }
            //             });
            //     }
            // });
        });
    </script>
@endsection
