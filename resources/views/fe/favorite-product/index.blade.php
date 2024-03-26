@extends('fe.layout.master')
@section('content')
    <style>
        .table-content table td.li-product-add-cart a {
            font-size: 14px;
            text-transform: uppercase;
            background: #4fadd5 !important;
            color: #fff;
            padding: 10px 20px;
            font-weight: 700;
            display: inline-block;
        }

        .table-content table td.li-product-add-cart a:hover {
            background: #1761d7 !important;
        }
    </style>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li class="active">@lang('Favorite Product')</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Wishlist Area Strat-->
    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <h4>
                <center>@lang('LIST OF YOUR FAVORITE PRODUCTS') </center>
            </h4>
            <div class="row" style="margin-top: 3%">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">@lang('Product Name')</th>
                                        <th class="li-product-thumbnail">@lang('Image')</th>
                                        <th class="li-product-price">@lang('Price')</th>
                                        <th class="li-product-stock-status">@lang('Status')</th>
                                        <th class="li-product-add-cart">@lang('Add To Cart')</th>
                                        <th class="li-product-remove">@lang('Action')</th>
                                    </tr>
                                </thead>
                                @if (count($products) > 0)
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="li-product-name"><a href="#">{{ $product->name }}</a></td>
                                                <td class="li-product-thumbnail">
                                                    <a href="#">
                                                        <img width="200px" src="{{ asset($product->image) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td class="li-product-price"><span
                                                        class="amount">{{ number_format($product->price, 0, ',', '.') }}
                                                        @lang('VND')</span></td>
                                                <td class="li-product-stock-status">
                                                    @if ($product->quantity > 10)
                                                        <b style="color: blue;">@lang('Stocking')</b>
                                                    @elseif($product->quantity < 10 && $product->quantity > 0)
                                                        <b>@lang('Almost out of stock')</b>
                                                    @elseif($product->quantity == 0)
                                                        <b>@lang('Out of stock')</b>
                                                    @else
                                                        <b>@lang('Unknown')</b>
                                                    @endif
                                                </td>
                                                <td class="li-product-add-cart">
                                                    <a data-product-name="{{ $product->name }}" class="button_add_cart"
                                                        href="{{ route('shopping.add.product', $product->id) }}">@lang('Purchase')</a>
                                                </td>
                                                <td class="li-product-remove">
                                                    <a href="{{ route('favorite-product.get.delete', $product->id) }}"
                                                        data-product-name="{{ $product->name }}"
                                                        class="delete_favorite_product"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tbody>
                                        <td colspan="6" style="text-align: left;">
                                            <span>
                                                @lang('There are no favorite products yet')
                                            </span>
                                        </td>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Wishlist Area End-->
@endsection
@section('javascript')
    <script>
        $(function() {
            $(".delete_favorite_product").click(function(event) {
                event.preventDefault();
                url = $(this).attr("href");
                name_product = $(this).attr("data-product-name");
                swal({
                        title: "@lang('Are you sure')?",
                        text: "@lang('Are you sure to delete the product') " + name_product +
                            " @lang('from favorite list')!",
                        icon: "info",
                        buttons: ["@lang('No')", "@lang('Yes')"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("@lang('Success')",
                                "@lang('The system is about to remove this product from your wishlist') !",
                                'success').then(function() {
                                window.location.href = url;
                            });
                        }
                    });
            });
            $(".button_add_cart").click(function(event) {
                event.preventDefault();
                url = $(this).attr("href");
                name_product = $(this).attr("data-product-name");
                $.ajax({
                    method: "GET",
                    url: url
                }).done(function(result) {
                    if (result.status == 1) {
                        swal("@lang('Success') !", "@lang('Product added') " + name_product + " @lang('to cart') !",
                            "success");
                        $(".cart-item-count").text(result.number_product_in_cart);
                        $(".price_total_cart").text(result.price_total_cart);
                    }
                    if (result.status == 2) {
                        swal("@lang('Warning') !", "@lang('Only in stock') " + result.product_less +
                            " @lang('product') " + name_product, "warning");
                    }
                    if (result.status == 3) {
                        swal("@lang('Warning') !", "@lang('Product') " + name_product + " @lang('does not exist') !",
                            "warning");
                    }
                    if (result.status == 4) {
                        swal("@lang('Warning') !", "@lang('Product') " + name_product + " @lang('out of stock') !",
                            "warning");
                    }
                    if (result.error) {
                        swal("@lang('Warning') !", "@lang('You need to login for this function')!", "warning");
                    }
                });
            });
        });
    </script>
@endsection
