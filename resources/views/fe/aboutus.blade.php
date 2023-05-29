@extends('fe.layout.master')
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li class="active">@lang('Information')</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <div class="about-us-wrapper pt-60 pb-40">
        <div class="container">
            <div class="row">
                <!-- About Text Start -->
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="about-text-wrap">
                        <h2>Kaiser Computer, nơi cung cấp sản phẩm tốt nhất cho bạn</h2>
                        <p>Ngày này trong nhịp sống hối hả của con người thì việc giành thời gian để ra ngoài để mua sắm trở
                            nên là 1 điều quá xa sỉ.. Những lo lắng về giao thông không an toàn và hạn chế trong việc mua
                            hàng truyền thống có thể tránh được trong khi mua sắm trực tuyến. Với mua sắm trực tuyến(online)
                        </p>
                        <p>Website kinh doanh linh kiện máy tính Gaming của chúng tôi chuyên cung cấp các sản phẩm tôt nhất
                            thị trường với giá cả phải chăng. Không những thế chúng tôi còn luôn đặt lợi ích khách hàng lên
                            đầu, luôn luôn thay đổi sao cho phù hợp với khách hàng.</p>
                    </div>
                </div>
                <!-- About Text End -->
                <!-- About Image Start -->
                <div class="col-lg-5 col-md-10">
                    <div class="about-image-wrap">
                        <img class="img-full" src="{{ asset('images/product/large-size/13.jpg') }}" alt="About Us" />
                    </div>
                </div>
                <!-- About Image End -->
            </div>
        </div>
    </div>
    <!-- about wrapper end -->
@endsection
