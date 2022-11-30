@extends('fe.layout.master')

@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Liên hệ</li>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.325305009834!2d105.9369279782067!3d21.006638082261517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a8ce5bc224ad%3A0xd6f070b1a3525c0d!2zMTAgTmcuIDE2MSBUcsOidSBRdeG7sywgVHLDonUgUXXhu7MsIEdpYSBMw6JtLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1650600219488!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div> <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-1 order-lg-2">
                <div class="col-lg-12">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Thông tin liên hệ</h3>
                        <p class="contact-page-message mb-25">Mọi thắc mắc và câu hỏi xin liên hệ với chúng tôi qua địa chỉ dưới đây</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Địa chỉ</h4>
                            <p>Số 10, ngõ 161, Trâu Quỳ, Gia Lâm, Hà Nội</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Số điện thoại</h4>
                            <p>Phone: 0969908298</p>
                            <!-- <p>Hotline: 1009 678 456</p> -->
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
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
