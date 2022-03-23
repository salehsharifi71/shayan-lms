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

    <!-- Start Contact Info Area -->
    <iframe style="width: 100%;height: 100%;top: 0;right: 0;position: fixed;border: none;z-index: 100000000000000000;" id="showClass"  sandbox="allow-same-origin allow-forms allow-scripts" allow="microphone *; camera *; display-capture *" allowfullscreen="" data-hj-allow-iframe="" mozallowfullscreen="" msallowfullscreen="" oallowfullscreen="" src="{{$url}}" webkitallowfullscreen=""></iframe>

    <!-- End Contact Info Area -->
{{--@endsection--}}
