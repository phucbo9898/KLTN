@extends('fe.layout.master')
@section('content')
    <section class="product-area li-laptop-product Special-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span style="">
                                @lang('Bạn đã đặt đơn hàng thành công, vui lòng kiểm tra thông tin đơn hàng qua email của bạn')
                            </span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="special-product-active owl-carousel">
                            <a href="{{ route('home') }}" class="btn btn-info">Quay về trang chủ</a>
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
@endsection
