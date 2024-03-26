@extends('fe.layout.master')
@section('content')
    <style>
        .sort_product li {
            padding: 6px 0px;
        }
        .sort_product .active a {
            color: blue;
        }
    </style>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li class="active">@lang('Category'): {{ $categoryDetail->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    @if (count($products) > 0)
                        <div class="shop-products-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                    <div class="product-area shop-product-area">
                                        <div class="row" style="    margin-top: -82px;">
                                            @foreach ($products as $product)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap" style="width: 269.98px; height: 390px;">
                                                        <div class="product-image" style="width: 269.98px; height: 206px;">
                                                            <a href="{{ route('product.index', [$product->slug, $product->id]) }}">
                                                                @if (isset($product->image))
                                                                    <img src="{{ asset($product->image) }}" alt="Li's Product Image">
                                                                @else
                                                                    <img src="{{ asset('noimg.png') }}" alt="Li's Product Image">
                                                                @endif
                                                            </a>
                                                            @if ($product->hot == 1)
                                                                <span class="sticker">Hot</span>
                                                            @endif
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        {{-- <a href="product-details.html">Số lượng: {{$product->pro_number}}</a> --}}
                                                                        <div class="rating-box">
                                                                            <?php
                                                                            $point = 0;
                                                                            if ($product->number_of_reviewers > 0) {
                                                                                $point = round($product->total_star / $product->number_of_reviewers);
                                                                            } else {
                                                                                $point = -1;
                                                                            }
                                                                            ?>
                                                                            <ul class="rating">
                                                                                @if ($point == -1)
                                                                                    <li style="color: #a4a4a4;
                                                                        font-size: 13px;
                                                                        text-transform: capitalize;
                                                                        transition: all 0.3s ease-in-out;">@lang('Not Yet Rated')</li>
                                                                                @else
                                                                                    @lang('Evaluate'):
                                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                                        <li class="{{ $i <= $point ? '' : 'no-star' }}"><i class="fa fa-star"></i></li>
                                                                                    @endfor
                                                                                @endif
                                                                            </ul>
                                                                        </div>
                                                                    </h5>

                                                                </div>
                                                                <h4><a class="product_name"
                                                                        href="{{ route('product.index', [$product->slug, $product->id]) }}">{{ $product->name }}</a>
                                                                </h4>
                                                                <div class="price-box">
                                                                    @if ($product->sale > 0)
                                                                        <span
                                                                            class="new-price new-price-2">{{ number_format(($product->price * (100 - $product->sale)) / 100, 0, ',', '.') }}
                                                                            @lang('VND')</span>
                                                                        <span
                                                                            class="discount-percentage">-{{ $product->sale }}%</span><br />
                                                                        <div class="old-price" style="padding-top: 6px">
                                                                            {{ number_format($product->price, 0, ',', '.') }}
                                                                            @lang('VND')</div>
                                                                    @else
                                                                        <span
                                                                            class="new-price">{{ number_format($product->price, 0, ',', '.') }}
                                                                            @lang('VND')</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active">
                                                                        <a class="button_add_cart" data-product-name="{{ $product->name }}" href="{{ route('shopping.add.product', $product->id) }}">
                                                                            @lang('Buy product')
                                                                        </a>
                                                                    </li>
                                                                    <li><a href="{{ route('product.index', [$product->slug, $product->id]) }}"
                                                                            title="quick view" class="quick-view-btn"><i
                                                                                class="fa fa-eye"></i></a></li>
                                                                    <li><a class="links-details button_add_favorite_product"
                                                                            data-product-name="{{ $product->name }}"
                                                                            href="{{ route('favorite-product.get.add', $product->id) }}"><i
                                                                                class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div style="margin-top:88px; text-align: center">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-7">
                                                    {{ $products->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div style="margin-top: 125px; margin-left: 300px; font-size: 20px; color: #a4a4a4">@lang('No products') !!!</div>
                    @endif
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                    <div class="">
                        <div style="text-align: center">
                            <h2><b style="color: #a4a4a4"><a
                                        href="{{ route('category.index', [$categoryDetail->slug, $categoryDetail->id]) }}"
                                        style="text-transform: uppercase; text-align: center">►
                                        {{ $categoryDetail->name }}</a></b></h2>
                            <hr style="margin: 30px 0" />
                        </div>
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box mt-50">
                        <div class="sidebar-title">
                            <h2><b>@lang('Sort type')</b></h2>
                        </div>
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area">
                            <div class="filter-sub-titel">@lang('Price range'): </div>
                            <div style="padding-left: 5%">
                                <ul class="sort_product" style="padding: 6px">
                                    <li class="{{ Request::route()->parameter('order') == 'duoi-1trieu' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'duoi-1trieu']) }}">@lang('Under 1 million VND')</a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == '1trieu-den-10trieu' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, '1trieu-den-10trieu']) }}">@lang('1 million - 10 million VND')</a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == '10trieu-den-20trieu' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, '10trieu-den-20trieu']) }}">@lang('10 million - 20 million VND')</a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == '20trieu-den-50trieu' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, '20trieu-den-50trieu']) }}">@lang('20 million - 50 million VND')</a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == 'tren-50trieu' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'tren-50trieu']) }}">@lang('Over 50 million VND')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-sub-titel mt-3">@lang('Other'): </div>
                            <div style="padding-left: 5%">
                                <ul class="sort_product" style="padding: 6px">
                                    <li class="{{ Request::route()->parameter('order') == 'sap-xep-tang-dan' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'sap-xep-tang-dan']) }}">
                                            @lang('Alphabetically from A - Z')
                                        </a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == 'sap-xep-giam-dan' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'sap-xep-giam-dan']) }}">
                                            @lang('Alphabetically from Z - A')
                                        </a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == 'sap-xep-theo-san-pham-moi-nhat' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'sap-xep-theo-san-pham-moi-nhat']) }}">
                                            @lang('New products first')
                                        </a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == 'sap-xep-theo-san-pham-cu-nhat' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'sap-xep-theo-san-pham-cu-nhat']) }}">
                                            @lang('New products later')
                                        </a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == 'sap-xep-theo-gia-tang-dan' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'sap-xep-theo-gia-tang-dan']) }}">
                                            @lang('Prices go up')
                                        </a>
                                    </li>
                                    <li class="{{ Request::route()->parameter('order') == 'sap-xep-theo-gia-giam-dan' ? 'active' : '' }}">
                                        <a href="{{ route('category.index.order', [$categoryDetail->slug, $categoryDetail->id, 'sap-xep-theo-gia-giam-dan']) }}">
                                            @lang('Prices go down')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @foreach ($categoryDetail->attributes as $attributes)
                                <div class="filter-sub-titel mt-3">{{  $attributes->name }}: </div>
                                <div style="padding-left: 5%">
                                    <ul class="sort_product" style="padding: 6px">
                                        @foreach ($attributes->attribute_values->sortbyDesc('value') as $attributeValue)
                                            <li class="{{ Request::route()->parameter('at') == $attributeValue->id ? 'active' : '' }}"><a
                                                    href="{{ route('category.index.order.attribute', [$categoryDetail->slug, $categoryDetail->id, $attributeValue->id]) }}">{{ $attributeValue->value }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <!-- filter-sub-area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->
@endsection
@section('javascript')
    <script>
        $(function() {
            $(".button_add_favorite_product").click(function(event) {
                event.preventDefault();
                name_product = $(this).attr("data-product-name");
                url = $(this).attr("href");
                $.ajax({
                    method: "GET",
                    url: url
                }).done(function(result) {
                    if (result.status == 1) {
                        swal("@lang('Success') !", "@lang("Product added") " + name_product +
                            " @lang("to your favorite product")!", "success");
                        $(".wishlist-item-count-custom").text(result.number_favorite_product);
                    }
                    if (result.status == 0) {
                        swal("@lang("Maybe you don't know") !", "@lang('Product') " + name_product +
                            " @lang('already exists in your wishlist') !", "info");
                    }
                    if (result.error) {
                        swal("@lang('Warning') !", "@lang('You need to login for this function')!", "warning");
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
                        $(".cart-item-count-number").text(result.number_product_in_cart);
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
