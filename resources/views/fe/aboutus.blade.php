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
                        <h2>@lang('Kaiser Computer, the place that provides the best products for you')</h2>
                        <p>@lang("These days in the hustle and bustle of people's lives, taking time to go out to shop has become a luxury. Worries about unsafe traffic and restrictions on traditional purchases avoidable while shopping online. With online shopping (online)")</p>
                        <p>@lang('Our Gaming computer parts business website specializes in providing the best products in the market at affordable prices. Not only that, we also always put the interests of customers first, always changing to suit customers.')</p>
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
