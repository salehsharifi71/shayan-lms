@extends('layouts.app')

@section('title') @lang('info.verifyEmail')  | @endsection
@section('content')
    <div class="container" style="margin-top: 85px;">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
													<span class="card-icon">
														<i class="flaticon2-correct text-primary"></i>
													</span>
                <h3 class="card-label">@lang('info.verifyEmail')</h3>
            </div>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    @lang('info.newVerifyLinkSend')
                </div>
            @endif
                @lang('info.verifyFirst')
        </div>
        <div class="card-footer d-flex justify-content-between">
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-primary font-weight-bold">@lang('info.resend')</button>
            </form>
        </div>
    </div>
    </div>
@endsection
