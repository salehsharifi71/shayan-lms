@extends('layouts.sites')

@section('siteContent')



    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    @lang('info.login')
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label>@lang('info.userName') <span class="text-danger">*</span></label>
                    <input type="text" name="username" required class="form-control" >
                </div>
                <div class="form-group">
                    <label>@lang('info.placeholderPass') <span class="text-danger">*</span></label>
                    <input type="password" name="password" required class="form-control" >
                </div>
                <input type="checkbox" name="remember" checked style="display:none;"> 
                <button type="submit" class="btn btn-primary mr-2">@lang('info.login')</button>
            </form>
        </div>
    </div>


@endsection
