@extends('fe.layout.master')
@section('content')
    <style>
        .btn-primary {
            color: #fff !important;
            background-color: #007bff !important;
            border-color: #007bff !important;
        }
        .btn-primary:hover {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
        }
        .btn-warning {
            color: #212529 !important;
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
        }
        .btn-warning:hover {
            background-color: #47ea36 !important;
            border-color: #47ea36 !important;
        }
    </style>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang("Home")</a></li>
                    <li class="active">@lang("Shopping")</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>@lang('Success')!</strong> {{ \Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (\Session::has('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>@lang('Error')!</strong> {{ \Session::get('warning') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="li-product-remove">@lang("Delete")</th>
                                <th class="li-product-thumbnail">@lang("Image")</th>
                                <th class="cart-product-name">@lang('Product name')</th>
                                <th class="li-product-price">@lang('Price')</th>
                                <th class="li-product-quantity">@lang('Quantity')</th>
                                <th class="li-product-subtotal">@lang('Total')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td class="li-product-remove"><a
                                            href="{{ route('shopping.delete.product', $key) }}"><i
                                                class="fa fa-times"></i></a></td>
                                    @if ($product->options->image)
                                        <td class="li-product-thumbnail" style="width: 16%"><a href="#"><img
                                                    style="width: 100%; height: 150px;"
                                                    src="{{ asset($product->options->image) }}"
                                                    alt="Li's Product Image"></a></td>
                                    @else
                                        <td class="li-product-thumbnail" style="width: 16%"><a href="#"><img
                                                    style="width: 100%; height: 150px;" src="{{ asset('noimg.png') }}"
                                                    alt="Li's Product Image"></a></td>
                                    @endif
                                    <td class="li-product-name"><a href="#">{{ $product->name }}</a></td>
                                    <td class="li-product-price"><span
                                            class="amount">{{ number_format($product->price, 2, ',', '.') }} @lang('VND')</span>
                                    </td>
                                    <td class="quantity">
                                        <form action="{{ route('shopping.edit.product') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="pro_id" value="{{ $product->id }}"/>
                                            <span style="color: #242424l;font-size: 16px;font-weight: 700;">{{ $product->qty }}
                                                @if ($product->qty > 1)
                                                    @lang('products')
                                                @else
                                                    @lang('product')
                                                @endif
                                                </span>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{ $product->qty }}"
                                                       name="number_product_edit" type="number" min="1">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                            <button class="btn btn-primary mt-2">@lang('Update')</button>
                                        </form>
                                    </td>
                                    <td class="product-subtotal"><span
                                            class="amount">{{ number_format($product->price * $product->qty, 2, ',', '.') }}
                                            @lang('VND')<br/> @lang('Into money'):
                                                {{ number_format($product->price * $product->qty, 0, ',', '.') }} @lang('VND')</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>@lang('Total Amount To Pay'):</h2>
                                <div class="mb-2">
                                    <form action="{{ route('shopping.add-coupon') }}" method="get">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <span>@lang("Voucher")</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="coupon" value="{{ session()->has('coupon') ? session()->get('coupon')->code : '' }}">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">@lang('Apply')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <ul>
                                    @if(session()->has('coupon'))
                                        <li>
                                            Trước giảm giá:
                                            <span>
                                                {{ \Cart::subtotal(0, ',', ',') }} @lang('VND')
                                            </span>
                                        </li>
                                        <li>
                                            Giảm giá:
                                            <span>
                                                {{ session()->get('coupon')->code . " (" . session()->get('coupon')->sale. "%" . ")" }}
                                            </span>
                                        </li>
                                        <li>
                                            @lang('Total')
                                            <span>
                                                {{ number_format(str_replace('.', '', \Cart::subtotal(0, ',', '.')) * (100 - session()->get('coupon')->sale) / 100) }} @lang('VND')
                                            </span>
                                        </li>
                                        <input type="hidden" class="total" value="{{ str_replace('.', '', \Cart::subtotal(0, ',', '.')) * (100 - session()->get('coupon')->sale) / 100 }}">
                                    @else
                                        <li>
                                            @lang('Total')
                                            <span>
                                                {{ \Cart::subtotal(0, ',', '.') }} @lang('VND')
                                            </span>
                                        </li>
                                        <input type="hidden" class="total" value="{{ \Cart::subtotal(0, ',', '.') }}">
                                    @endif
                                </ul>
                                <div class="mt-15">
                                    @if (\Cart::subtotal() > 0)
                                        <a class="btn btn-primary" href="{{ route('feature-user.checkout') }}" style="float: right; margin-left: 20px;">
                                            @lang('Order confirmation')
                                        </a>
                                    @endif
                                </div>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
@endsection
