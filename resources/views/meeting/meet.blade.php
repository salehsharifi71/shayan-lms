@extends('layouts.panel')
@section('title') @lang('info.orgMeet') | @endsection
@section('subheader')   @endsection
@section('panelContent')
    @inject('stringService', 'App\Services\StringService')

    <div class="col-md-12">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">@lang('info.orgMeet')</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route('orgClassEdit',0)}}" class="btn btn-sm btn-success font-weight-bold">
                    <i class="flaticon-plus"></i>@lang('info.addNewClass')</a>
            </div>
        </div>
        <div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">@lang('info.title')</th>
            <th scope="col">@lang('info.startAt')</th>
            <th scope="col">@lang('info.expireAt')</th>
            <th scope="col">@lang('info.status')</th>
            <th scope="col">@lang('info.op')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meetings as $meet)
            <tr>
                <td>{{$meet->title}}</td>
                <td>{{$stringService->prettyNumber(jdate($meet->startAt)->format('%d %B  %Y'))}}</td>
                <td>{{$stringService->prettyNumber(jdate($meet->expired_at)->format('%d %B  %Y'))}}</td>
                <td>
                    @if($meet->status==0)
                        <span class="label label-inline label-light-warning font-weight-bold">
                            @lang('info.waitPayment')
                        </span>
                   @elseif($meet->status==10)
                        <span class="label label-inline label-light-success font-weight-bold">
                            @lang('info.ready')
                        </span>
                    @endif

                </td>
                <td>
                    @if($meet->status==0)
                        <a href="{{route('makePayment',['id'=>$meet->hash,'kind'=>'1'])}}"><button class="btn btn-success btn-sm"> <i class="fas fa-dollar-sign"></i> @lang('info.pay')</button> </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
    </div>

@endsection