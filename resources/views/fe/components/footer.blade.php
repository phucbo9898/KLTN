<!-- Begin Footer Area -->
<style>
    .text-color {
        color: black !important;
    }
    .text-color:hover {
        color: blue !important;
    }
</style>
<div class="footer">
    <!-- Begin Footer Static Top Area -->
    <div class="footer-static-top">
        <div class="container">
            <!-- Begin Footer Shipping Area -->
            <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                <div class="row">
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('images/shipping-icon/free_ship.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Free shipping')</h2>
                                <p>@lang('Free return. See payment for the transaction date.')</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('images/shipping-icon/cost_save.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Cost savings')</h2>
                                <p>@lang('The cost of the product will be for the benefit of the customer.')</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('images/shipping-icon/security.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Information security')</h2>
                                <p>@lang('Customer information will not be shared with third parties.')</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{ asset('images/shipping-icon/support.png') }}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Support 24/7')</h2>
                                <p>@lang('If you have questions? Please contact us immediately.')</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                </div>
            </div>
            <!-- Footer Shipping Area End Here -->
        </div>
    </div>
    <!-- Footer Static Top Area End Here -->
    <!-- Begin Footer Static Middle Area -->
    <div class="footer-static-middle">
        <div class="container">
            <div class="footer-logo-wrap pt-50 pb-35">
                <div class="row" id="hover_footer">
                    <!-- Begin Footer Logo Area -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-logo">
                            <img src="{{ asset('images/logo-fe.png') }}" alt="Footer Logo" style="width: 75px;">
                            <p class="info">
                                @lang('This website is currently in the testing and development phase to be more complete before being put into business and commercialization.')
                            </p>
                        </div>
                        <ul class="des">
                            <li>
                                <span>@lang('Address'): </span>
                                @lang('Mitec Building, Yen Hoa, Cau Giay, Hanoi, Vietnam')
                            </li>
                            <li>
                                <span>@lang('Phone Number'): </span>
                                <a href="#" class="text-color">0969908298</a>
                            </li>
                            <li>
                                <span>@lang('Email'): </span>
                                <a href="mailto://phucbo9898@gmail.com" class="text-color">phucbo9898@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Logo Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">@lang('Outstanding')</h3>
                            <ul id="hover_inf">
                                <li><span style="text-decoration: none;">@lang('Free shipping')</span></li>
                                <li><span style="text-decoration: none;">@lang('Cost savings')</span></li>
                                <li><span style="text-decoration: none;">@lang('Security')</span></li>
                                <li><span style="text-decoration: none;">@lang('Support 24/7')</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">@lang('Feature')</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}" style="text-decoration: none;" class="text-color">@lang('Home')</a>
                                </li>
                                <li>
                                    <a href="#" style="text-decoration: none;" class="text-color">@lang('Article')</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}"
                                        style="text-decoration: none;" class="text-color">@lang('About us')</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}"
                                        style="text-decoration: none;" class="text-color">@lang('Contact')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-4">
                        <div class="footer-block">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3183324100223!2d105.7794391288416!3d21.019945048700038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abbdcaac09d3%3A0x3ca8b3615e092fa4!2sMitec%20Building!5e0!3m2!1svi!2sus!4v1672212195191!5m2!1svi!2sus"
                                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Middle Area End Here -->
    <!-- Begin Footer Static Bottom Area -->
    <div class="footer-static-bottom pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right" style="text-align: center; color: white;">
                        <p>
                            @lang('This project is made with')
                            <i class="icon-heart color-danger" aria-hidden="true"></i> @lang('by') <span
                                style="color: red; font-size: 20px">♥</span>
                            <a href="https://www.facebook.com/phucbo9898" target="_blank" style="color: #3b7fce;">Vũ Ngọc Phúc</a> @lang('on')
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Bottom Area End Here -->
</div>
<!-- Footer Area End Here -->
