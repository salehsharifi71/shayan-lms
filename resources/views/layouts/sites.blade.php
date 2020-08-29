<!DOCTYPE html>
<!--
Mohammad Saleh Sharifi (salehsharifi.ir)
fanavaran novin jahani (fenj.ir)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " @if(config('app.direction')=='rtl') direction="rtl" style="direction: rtl;" @endif >
<!--begin::Head-->
<head>
    <base href="/" />
    <meta charset="utf-8" />
    <title>@yield('title') {{$organizer->title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->

    @if(app()->getLocale()=='fa')
        <link href="assets/css/fa.font.css" rel="stylesheet" type="text/css" />
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
    @endif @yield('style') @yield('headScript') @if(config('app.direction')=='rtl')

        <link href="assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    @else
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    @endif
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" style="background-image: url(assets/media/bg/bg-10.jpg);" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile">
    <!--begin::Logo-->
    <a href="#">
        <img alt="Logo" src="assets/media/logos/logo-letter-1.png" class="logo-default max-h-30px" />
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container d-flex align-items-stretch justify-content-between">
                    <!--begin::Left-->
                    <div class="d-flex align-items-stretch mr-3">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">
                                    <li class="menu-item menu-item-submenu menu-item-rel" >
                                        <a href="/" class="menu-link ">
                                            <span class="menu-text">{{$organizer->title}}</span>
                                            <span class="menu-desc"></span>
                                        </a>

                                    </li>
                                    <li class="menu-item menu-item-submenu menu-item-rel showMobOnly" >
                                        <a href="{{route('siteLogin')}}" style="margin: 5px;" class="menu-link btn btn-success">
                                            <span class="menu-text">@lang('info.login')</span>
                                            <span class="menu-desc"></span>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-submenu menu-item-rel showMobOnly " >
                                        <a href="{{route('siteRegister')}}" style="margin: 5px;" class="menu-link btn btn-primary">
                                            <span class="menu-text">@lang('info.signUp')</span>
                                            <span class="menu-desc"></span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                    </div>
                    <!--end::Left-->

                    <!--begin::Topbar-->
                    <div class="topbar">
                            <a href="{{route('siteLogin')}}" style="margin: 20px 5px;height: 40px;top: 11px;" class="menu-link btn btn-success">
                                <span class="menu-text">@lang('info.login')</span>
                                <span class="menu-desc"></span>
                            </a>
                            <a href="{{route('siteRegister')}}" style="margin: 20px 5px;height: 40px;top: 11px;" class="menu-link btn btn-primary">
                                <span class="menu-text">@lang('info.signUp')</span>
                                <span class="menu-desc"></span>
                            </a>

                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->

            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Education-->
                        <div class="d-flex flex-column flex-md-row">
                            <!--begin::Aside-->
                            <div class="flex-md-row-auto w-md-275px w-xl-325px">
                                <!--begin::Nav Panel Widget 3-->
                                <div class="card card-custom gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex justify-content-between flex-column h-100">
                                            <!--begin::Container-->
                                            <div class="h-100">
                                                <!--begin::Header-->
                                                <div class="d-flex flex-column flex-center">
                                                    <!--begin::Image-->
                                                    <div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url(assets/media/stock-600x400/img-70.jpg);">
                                                        @if($organizer->logo)
                                                            <img class="min-h-180px w-100 rounded" src="{{$organizer->logo}}">
                                                        @endif
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Title-->
                                                    <a href="/" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">
                                                        {{$organizer->title}}

                                                    </a>
                                                    <!--end::Title-->

                                                </div>
                                                <!--end::Header-->

                                            </div>
                                            <!--eng::Container-->

                                            <!--begin::Footer-->

                                            <!--end::Footer-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Nav Panel Widget 3-->

                            </div>
                            <!--end::Aside-->

                            <!--begin::Content-->
                            <div class="flex-md-row-fluid ml-md-6 ml-lg-8">
                                <div class="row">
                                    <div class="col-xxl-6">
                                        <!--end::Content-->
                                         @yield('siteContent')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Education-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">@lang('info.poweredBy')</span>
                        <a href="{{env('APP_URL')}}" target="_blank" class="text-dark-75 text-hover-primary">@lang('info.baseTitle')</a>
                    </div>
                    <!--end::Copyright-->

                    <!--begin::Nav-->
                    {{--<div class="nav nav-dark order-1 order-md-2">--}}
                        {{--<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pr-3 pl-0">About</a>--}}
                        {{--<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link px-3">Team</a>--}}
                        {{--<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-3 pr-0">Contact</a>--}}
                    {{--</div>--}}
                    <!--end::Nav-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"></rect>
                    <path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000"
                            fill-rule="nonzero"
                    ></path>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
</div>
<!--end::Scrolltop-->

<script>
    var KTAppSettings = {
        breakpoints: {
            sm: 576,
            md: 768,
            lg: 992,
            xl: 1200,
            xxl: 1200,
        },
        colors: {
            theme: {
                base: {
                    white: "#ffffff",
                    primary: "#6993FF",
                    secondary: "#E5EAEE",
                    success: "#1BC5BD",
                    info: "#8950FC",
                    warning: "#FFA800",
                    danger: "#F64E60",
                    light: "#F3F6F9",
                    dark: "#212121",
                },
                light: {
                    white: "#ffffff",
                    primary: "#E1E9FF",
                    secondary: "#ECF0F3",
                    success: "#C9F7F5",
                    info: "#EEE5FF",
                    warning: "#FFF4DE",
                    danger: "#FFE2E5",
                    light: "#F3F6F9",
                    dark: "#D6D6E0",
                },
                inverse: {
                    white: "#ffffff",
                    primary: "#ffffff",
                    secondary: "#212121",
                    success: "#ffffff",
                    info: "#ffffff",
                    warning: "#ffffff",
                    danger: "#ffffff",
                    light: "#464E5F",
                    dark: "#ffffff",
                },
            },
            gray: {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121",
            },
        },
        "font-family": "Poppins",
    };
</script>
<!--end::Global Config-->

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
@yield('footerScript')
<script>
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-bottom-right",
        preventDuplicates: false,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
</script>
@if ($errors->any())
    <script>
        msg='';

        @foreach($errors->all() as $error)

            msg= msg + "{!! $error !!} <br>";
        @endforeach
        toastr.error(msg);
    </script>
@endif @if(session()->has('success'))
    <script>
        toastr.success(' {{ session()->get('success') }} ');
    </script>
@endif

<script src="assets/js/fenj.js"></script>
</body>
</html>