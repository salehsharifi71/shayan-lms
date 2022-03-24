{{--@extends('layouts.sites')--}}
{{--@section('title')  @endsection--}}
{{--@section('headMeta') <style>.footer-area{display:none}</style> @endsection--}}
{{--@section('siteContent')--}}
{{--    <!--begin::Forms Widget 2-->--}}
{{--    <div class="card card-custom gutter-b">--}}
{{--        <div class="card-header">--}}
{{--            <div class="card-title">--}}
{{--                <h3 class="card-label">خطا در ارتباط</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--begin::Body-->--}}
{{--        <div class="card-body">--}}

{{--            @lang('info.classNotFound')--}}
{{--        </div>--}}
{{--        <!--end::Body-->--}}
{{--    </div>--}}
    <!--end::Forms Widget 2-->
<!DOCTYPE html>
<html>
<head>
    <title>Meet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

</head>
<body>

<iframe style="width: 100%;height: 100%;top: 0;right: 0;position: fixed;border: none;z-index: 100000000000000000;" id="showClass"  allow="microphone *; camera *; display-capture *" allowfullscreen="" data-hj-allow-iframe="" mozallowfullscreen="" msallowfullscreen="" oallowfullscreen="" src="{{$url}}" webkitallowfullscreen=""></iframe>
<script>
   document.getElementById('showClass').setAttribute('allow','microphone *; camera *; display-capture *');
</script>
</body>
</html>
<!-- Start Contact Info Area -->

    <!-- End Contact Info Area -->
{{--@endsection--}}
