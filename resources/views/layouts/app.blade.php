
<!DOCTYPE html>
<!--
Mohammad Saleh Sharifi (salehsharifi.ir)
fanavaran novin jahani (fenj.ir)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " @if(config('app.direction')=='rtl') direction="rtl" style="direction: rtl;" @endif >
<!--begin::Head-->
<head>
    <base href="{{config('app.asset_url') }}">
    <meta charset="utf-8"/>
    <title>@yield('title') @lang('info.baseTitle')</title>
    <meta name="description" content="@lang('info.description')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->

    @if(app()->getLocale()=='fa')
        <link href="assets/css/fa.font.css" rel="stylesheet" type="text/css" />
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->
    @endif
    @yield('style')
    @yield('headScript')
<!-- shayanlms  - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179271998-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-179271998-1');
    </script>
    @if(config('app.direction')=='rtl')

        <link href="assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/custom/prismjs/prismjs.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    @else
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

    @endif
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
</head>
<!--end::Head-->

<!--begin::Body-->
<body  id="kt_body" style="background-image: url(assets/media/bg/bg-10.jpg)"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >
@yield('content')
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->

<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
@yield('footerScript')
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
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
@endif

@if(session()->has('success'))
   <script> toastr.success(' {{ session()->get('success') }} ');</script>
@endif

<script src="assets/js/fenj.js"></script>
</body>
<!--end::Body-->
</html>