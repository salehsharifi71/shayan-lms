<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <!--
    Mohammad Saleh Sharifi (salehsharifi.ir)
    fanavaran novin jahani (fenj.ir)
    -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="/assets/publicTheme/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/publicTheme/css/animate.css" />
    <link rel="stylesheet" href="/assets/publicTheme/css/icofont.min.css" />
    <link rel="stylesheet" href="/assets/publicTheme/css/meanmenu.css" />
    <link rel="stylesheet" href="/assets/publicTheme/css/magnific-popup.min.css" />
    <link rel="stylesheet" href="/assets/publicTheme/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/publicTheme/css/nice-select.css" />
    @if(config('app.direction')=='rtl')
        <link rel="stylesheet" href="/assets/publicTheme/css/rtlstyle.css" />
    @else
        <link rel="stylesheet" href="/assets/publicTheme/css/style.css" />
    @endif

    <link rel="stylesheet" href="/assets/publicTheme/css/responsive.css" />
    <title>@yield('title') @lang('info.baseTitle')</title>
    <link rel="icon" type="image/png" href="assets/media/logos/favicon.ico" />
    @if(app()->getLocale()=='fa')
        <link href="assets/css/fa.font.css" rel="stylesheet" type="text/css" />
    @endif
    @yield('headMeta')
</head>
<body>
<div class="preloader-area"><div class="lds-hourglass"></div></div>
<header id="header">
    <div class="crake-mobile-nav">
        <div class="logo"><a href="{{route('welcome')}}"><img src="/assets/publicTheme/img/logo.png" alt="" /></a></div>
    </div>
    <div class="crake-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('welcome')}}"><img src="/assets/publicTheme/img/logo.png" alt="logo" /></a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('welcome')}}" class="nav-link @if(Route::current()->getName() == 'welcome')active @endif">@lang('info.home')</a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('welcome')}}#pricing" class="nav-link @if(Route::current()->getName() == 'pricing')active @endif">@lang('info.pricing')</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('page','contact')}}" class="nav-link ">@lang('info.contact')</a>

                        </li>
                        {{--<li class="nav-item">--}}
                        @auth

                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link ">@lang('info.dashboard')</a>

                        </li>
                        @else
                            <a href="{{route('login')}}" class="btn btn-success  " style="padding: 12px;margin: 5px;">@lang('info.login')</a>
                            <a href="{{route('register')}}" class="btn btn-primary  " style="padding: 12px;margin: 5px;">@lang('info.signUp')</a>
                        @endauth
                        {{--</li>--}}
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
@yield('publicContent')
<footer class="footer-area ptb-100 pb-0 bg-image">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-footer-widget">
                    <a href="{{route('welcome')}}" class="logo"><img src="/assets/publicTheme/img/logo2.png" alt="logo2" /></a>
                    <p>@lang('info.descriptionLong')</p>
                    {{--<ul class="social-list">--}}
                        {{--<li>--}}
                            {{--<a href="#"><i class="icofont-facebook"></i></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#"><i class="icofont-twitter"></i></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#"><i class="icofont-instagram"></i></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#"><i class="icofont-linkedin"></i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-6 col-md-6"><p>@lang('info.copyright')</p></div>
                <div class="col-lg-6 col-md-6">
                    <ul>
                        <li><a href="{{route('page','legal')}}">@lang('info.legal')</a></li>
                        <li><a href="{{route('page','contact')}}">@lang('info.contact')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="back-to-top">Top</div>
<script src="/assets/publicTheme/js/jquery.min.js"></script>
<script src="/assets/publicTheme/js/popper.min.js"></script>
<script src="/assets/publicTheme/js/bootstrap.min.js"></script>
<script src="/assets/publicTheme/js/canvas.min.js"></script>
<script src="/assets/publicTheme/js/jquery.meanmenu.min.js"></script>
<script src="/assets/publicTheme/js/wow.min.js"></script>
<script src="/assets/publicTheme/js/tilt.jquery.min.js"></script>
<script src="/assets/publicTheme/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/publicTheme/js/owl.carousel.min.js"></script>
<script src="/assets/publicTheme/js/waypoints.min.js"></script>
<script src="/assets/publicTheme/js/jquery.counterup.min.js"></script>
<script src="/assets/publicTheme/js/jquery.nice-select.min.js"></script>
<script src="/assets/publicTheme/js/jquery.ajaxchimp.min.js"></script>
<script src="/assets/publicTheme/js/form-validator.min.js"></script>
<script src="/assets/publicTheme/js/contact-form-script.js"></script>
<script src="/assets/publicTheme/js/main.js"></script>
</body>
</html>
