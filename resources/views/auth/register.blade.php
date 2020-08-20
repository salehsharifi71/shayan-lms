@extends('layouts.app')

@section('title') @lang('info.signUp')  | @endsection
@section('style')
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/classic/login-1.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
@endsection
@section('content')

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(assets/media/bg/bg-4.jpg);">
                <!--begin: Aside Container-->
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <!--begin: Aside header-->
                    <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                        <img src="assets/media/logos/logo-letter-1.png" class="max-h-70px" alt=""/>
                    </a>
                    <!--end: Aside header-->

                    <!--begin: Aside content-->
                    <div class="flex-column-fluid d-flex flex-column justify-content-center">
                        <h3 class="font-size-h1 mb-5 text-white">@lang('info.baseTitle')</h3>
                        <p class="font-weight-lighter text-white opacity-80">
                            @lang('info.description')
                        </p>
                    </div>
                    <!--end: Aside content-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                        <div class="opacity-70 font-weight-bold	text-white">
                            @lang('info.copyright')
                        </div>
                        <div class="d-flex">
                            <a href="{{route('page','privacy')}}" class="text-white">@lang('info.privacy')</a>
                            <a href="{{route('page','legal')}}" class="text-white ml-10">@lang('info.legal')</a>
                            <a href="{{route('page','contact')}}" class="text-white ml-10">@lang('info.contact')</a>
                        </div>
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
                <!--begin::Content header-->
                <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
                    <span class="font-weight-bold text-dark-50">@lang('info.signUpBefore')</span>
                    <a href="{{route('login')}}" class="font-weight-bold ml-2">@lang('info.signIn')</a>
                </div>
                <!--end::Content header-->

                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">

                    <!--begin::Signup-->
                    <div class="login-form login-login">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="font-size-h1">@lang('info.signUp')</h3>
                        </div>

                        <!--begin::Form-->
                        <form class="form" id="kt_login_signup_form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="@lang('info.placeholderName')" name="name" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="@lang('info.placeholderUser')" name="email" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="@lang('info.placeholderPass')" name="password" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="@lang('info.placeholderPassConfirm')" name="password_confirmation" autocomplete="off" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="checkbox mb-0">
                                    <input type="checkbox" name="agree" required/>
                                    <span></span>
                                    @lang('info.iAgree')  <a href="{{route('page','legal')}}" target="_blank"> @lang('info.legal') </a>
                                </label>
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center">
                                <button type="submit"  class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">@lang('info.signUp')</button>
                                    <a href="{{route('login')}}"> <button type="button" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">@lang('info.goBack')</button></a>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signup-->

                    <!--begin::Forgot-->
                    <div class="login-form login-forgot">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="font-size-h1">Forgotten Password ?</h3>
                            <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                        </div>

                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off"/>
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center">
                                <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                                <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                </div>
                <!--end::Content body-->
                <div class="opacity-70 font-weight-bold	text-white">
                    @lang('info.copyright')
                </div>
                <div class="d-flex">
                    <a href="{{route('page','privacy')}}" class="text-white">@lang('info.privacy')</a>
                    <a href="{{route('page','legal')}}" class="text-white ml-10">@lang('info.legal')</a>
                    <a href="{{route('page','contact')}}" class="text-white ml-10">@lang('info.contact')</a>
                </div>
                <!--begin::Content footer for mobile-->
                <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                    <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                        @lang('info.copyright')
                    </div>
                    <div class="d-flex order-1 order-sm-2 my-2">
                        <a href="{{route('page','privacy')}}" class="text-dark-75 text-hover-primary">@lang('info.privacy')</a>
                        <a href="{{route('page','legal')}}" class="text-dark-75 text-hover-primary ml-4">@lang('info.legal')</a>
                        <a href="{{route('page','contact')}}" class="text-dark-75 text-hover-primary ml-4">@lang('info.contact')</a>
                    </div>
                </div>
                <!--end::Content footer for mobile-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->



@endsection

@section('footerScript')
    {{--<script src="assets/js/pages/custom/login/login-general.js"></script>--}}
@endsection