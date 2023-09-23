@include('website.master.includes.head.index')
<div id="newslater-popup" class="mfp-hide white-popup-block open align-center">
    <div class="nl-popup-main">
        <div class="nl-popup-inner">
            <div class="newsletter-inner">
                <span>Sign up & get 10% off</span>
                <h2 class="main_title">Subscribe Emails</h2>
                <form>
                    <input type="email" placeholder="Email Here...">
                    <button class="btn-black" title="Subscribe">Subscribe</button>
                </form>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.</p>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <!-- HEADER START -->
    <header class="navbar navbar-custom" id="header">
        @include('website.master.includes.header.top.index')
        <div class="header-bottom container-full-sm">
            <div class="container position-r">
                <div class="row position-r">
                    <div class="col-lg-2 col-md-3 col-lgmd-20per position-initial">
                        <div class="sidebar-menu-dropdown home ptb-20">
                            <a class="btn-sidebar-menu-dropdown"><span></span> Categories</a>
                            <div id="cat" class="cat-dropdown">
                                <div class="sidebar-contant">
                                    <div id="menu" class="navbar-collapse collapse">
                                        @include('website.master.includes.categories.index')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-lgmd-80per">
                        <div class="nav_sec position-r">
                            <div class="mobilemenu-title mobilemenu">
                                <span>Menu</span>
                                <i class="fa fa-bars pull-right"></i>
                            </div>
                            <div class="mobilemenu-content">
                                <ul class="nav navbar-nav" id="menu-main">
                                    <li @if(request()->is('/'))class="active"@endif>
                                        <a href="{{route('home')}}">Home</a>
                                    </li>
                                    <li @if(request()->is('shop'))class="active"@endif>
                                        <a href="{{route('shop.products')}}">Shop</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="sidebar-search-wrap">
        <div class="sidebar-table-container">
            <div class="sidebar-align-container">
                <div class="search-closer right-side"></div>
                <div class="search-container">
                    <form action="{{route('search')}}" method="POST" id="search-form">
                        @csrf
                        <input type="text" id="s" class="search-input" name="search" placeholder="Start Searching">
                    </form>
                    <span>Search and Press Enter</span>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER END -->

    <!-- CONTAIN START -->
@yield('body')
<!-- CONTAINER END -->


    <!-- FOOTER START -->
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-middle">
                    <div class="row mb-60">
                        <div class="col-md-4 f-col footer-middle-left">
                            <div class="f-logo">
                                <a href="index.html" class="">
                                    <img src="{{asset('/')}}website/assets/images/footer-logo.png" alt="Eshoper">
                                </a>
                            </div>
                            <div class="footer-static-block"><span class="opener plus"></span>
                                <ul class="footer-block-contant address-footer">
                                    <li class="item"><i class="fa fa-map-marker"> </i>
                                        <p>150-A Appolo aprtment, opp. Hopewell Junction, <br>Allen st Road, new
                                            york-405001.</p>
                                    </li>
                                    <li class="item"><i class="fa fa-envelope"> </i>
                                        <p><a>infoservices@eshoper.com </a></p>
                                    </li>
                                    <li class="item"><i class="fa fa-phone"> </i>
                                        <p>(+91) 9834567890</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 footer-middle-right">
                            <div class="row mb-40">
                                <div class="icon-newsletter">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="footer_social pt-xs-15 center-sm">
                                            <ul class="social-icon">
                                                <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a>
                                                </li>
                                                <li><a title="Twitter" class="twitter"><i
                                                            class="fa fa-twitter"> </i></a></li>
                                                <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a>
                                                </li>
                                                <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                                                <li><a title="Pinterest" class="pinterest"><i
                                                            class="fa fa-pinterest"> </i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12">
                                        <div class="newsletter-inner center-sm">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="newsletter-title">
                                                        <h2 class="main_title">newsletter!</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <form>
                                                        <div class="newsletter-box">
                                                            <input type="email" placeholder="Email Here...">
                                                            <button title="Subscribe" class="btn-color">Subscribe
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 f-col">
                                    <div class="footer-static-block"><span class="opener plus"></span>
                                        <h3 class="title">Help <span></span></h3>
                                        <ul class="footer-block-contant link">
                                            <li><a>Gift Cards</a></li>
                                            <li><a>Order Status</a></li>
                                            <li><a>Free Shipping</a></li>
                                            <li><a>Return & Exchange </a></li>
                                            <li><a>International</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 f-col">
                                    <div class="footer-static-block"><span class="opener plus"></span>
                                        <h3 class="title">Guidance <span></span></h3>
                                        <ul class="footer-block-contant link">
                                            <li><a> Delivery information</a></li>
                                            <li><a> Privacy Policy</a></li>
                                            <li><a> Terms & Conditions</a></li>
                                            <li><a> Contact</a></li>
                                            <li><a> Sitemap</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 f-col">
                                    <div class="footer-static-block"><span class="opener plus"></span>
                                        <h3 class="title">Information <span></span></h3>
                                        <ul class="footer-block-contant link">
                                            <li><a> Delivery information</a></li>
                                            <li><a> Privacy Policy</a></li>
                                            <li><a> Terms & Conditions</a></li>
                                            <li><a>Contact</a></li>
                                            <li><a> Sitemap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="footer-bottom align-center">
                    <div class="row">
                        <div class="col-sm-12 mb-30">
                            <div class="site-link">
                                <ul>
                                    <li><a>About Us</a></li>
                                    <li><a>Contact Us</a></li>
                                    <li><a>Customer </a></li>
                                    <li><a>Service</a></li>
                                    <li><a>Privacy</a></li>
                                    <li><a>Policy </a></li>
                                    <li><a>Accessibility</a></li>
                                    <li><a>Directory </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-30">
                            <div class="copy-right ">© 2017 All Rights Reserved. Design By <a href="#">Aaryaweb</a>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-30">
                            <div class="payment">
                                <ul class="payment_icon">
                                    <li class="visa"><a><img src="{{asset('/')}}website/assets/images/pay1.png"
                                                             alt="Eshoper"></a></li>
                                    <li class="discover"><a><img src="{{asset('/')}}website/assets/images/pay2.png"
                                                                 alt="Eshoper"></a></li>
                                    <li class="paypal"><a><img src="{{asset('/')}}website/assets/images/pay3.png"
                                                               alt="Eshoper"></a></li>
                                    <li class="vindicia"><a><img src="{{asset('/')}}website/assets/images/pay4.png"
                                                                 alt="Eshoper"></a></li>
                                    <li class="atos"><a><img src="{{asset('/')}}website/assets/images/pay5.png"
                                                             alt="Eshoper"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-top">
        <div id="scrollup"></div>
    </div>
    <!-- FOOTER END -->
</div>
<script src="{{asset('/')}}website/assets/js/jquery-1.12.3.min.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}website/assets/js/jquery-ui.min.js"></script>
<script src="{{asset('/')}}website/assets/js/fotorama.js"></script>
<script src="{{asset('/')}}website/assets/js/jquery.magnific-popup.js"></script>
<script src="{{asset('/')}}website/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}website/assets/js/custom.js"></script>

<script>
    /* ------------ Newslater-popup JS Start ------------- */
    // $(window).load(function() {
    //     $.magnificPopup.open({
    //         items: {src: '#newslater-popup'},type: 'inline'}, 0);
    // });
    /* ------------ Newslater-popup JS End ------------- */
</script>

</body>
</html>
