@extends('fe.layout.master')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li class="active">@lang('Contact')</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Contact Main Page Area -->
    <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3183324100223!2d105.7794391288416!3d21.019945048700038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abbdcaac09d3%3A0x3ca8b3615e092fa4!2sMitec%20Building!5e0!3m2!1svi!2sus!4v1672212195191!5m2!1svi!2sus"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div> <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 order-1 order-lg-2 d-flex">
                    <div class="col-lg-12">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title">@lang('Information Contact')</h3>
                            <p class="contact-page-message mb-25">
                                @lang('If you have any questions or concerns, please contact us at the address below')
                            </p>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i>&ensp;@lang('Address')</h4>
                                <p>@lang('Mitec Building, Yen Hoa, Cau Giay, Hanoi, Vietnam')</p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i>&ensp;@lang('Phone Number')</h4>
                                <p>@lang('Phone'):&ensp;0969908298</p>
                                <!-- <p>Hotline: 1009 678 456</p> -->
                            </div>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope-o"></i>&ensp;Email</h4>
                                <a href="mailto://phucbo9898@gmail.com" class="hovermail">phucbo9898@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Contact Main Page Area End Here -->
@endsection

<style>
    .hovermail {
        color: blue;
    }

    .hovermail:hover {
        color: #bcc029;
    }
</style>
