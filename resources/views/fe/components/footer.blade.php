<!-- Begin Footer Area -->
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
                                <img src="{{asset('images/shipping-icon/free_ship.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Free shipping')</h2>
                                <p>Miễn phí trả lại. Hãy xem thanh toán cho ngày giao dịch.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('images/shipping-icon/cost_save.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Cost savings')</h2>
                                <p>Giá thành sản phẩm sẽ vì lợi ích của khách hàng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('images/shipping-icon/security.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Information security')</h2>
                                <p>Thông tin của khách hàng sẽ không được chia sẻ với bên thứ ba.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="{{asset('images/shipping-icon/support.png')}}" alt="Shipping Icon">
                            </div>
                            <div class="shipping-text">
                                <h2>@lang('Support 24/7')</h2>
                                <p>Nếu bạn có câu hỏi? Hãy liên hệ ngay với chúng tôi.</p>
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
                            <img src="{{asset('images/logo-fe.png')}}" alt="Footer Logo" style="width: 75px;">
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
                                <a href="#">0969908298</a>
                            </li>
                            <li>
                                <span>@lang('Email'): </span>
                                <a href="mailto://phucbo9898@gmail.com">phucbo9898@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Logo Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">@lang('Outstanding')</h3>
                            <ul id="hover_inf">
                                <li><a href="#" style="text-decoration: none;">@lang('Free shipping')</a></li>
                                <li><a href="#" style="text-decoration: none;">@lang('Cost savings')</a></li>
                                <li><a href="#" style="text-decoration: none;">@lang('Security')</a></li>
                                <li><a href="#" style="text-decoration: none;">@lang('Support 24/7')</a></li>
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
                                    <a href="{{ route('home') }}" style="text-decoration: none;">@lang('Home')</a>
                                </li>
                                <li>
                                    <a href="#" style="text-decoration: none;">@lang('Articel')</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}"
                                        style="text-decoration: none;">@lang('About us')</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}"
                                        style="text-decoration: none;">@lang('Contact')</a>
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
    <div class="footer-static-bottom pt-55 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right" style="text-align: center; color: white;">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This template is made with
                            <i class="icon-heart color-danger" aria-hidden="true"></i> by <span
                                style="color: red; font-size: 20px">♥</span>
                            <a href="#" target="_blank" style="color: #3b7fce;">Kise</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Bottom Area End Here -->
</div>
<!-- Footer Area End Here -->
