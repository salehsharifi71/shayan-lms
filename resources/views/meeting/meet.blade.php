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
            {{--<th scope="col">@lang('info.startAt')</th>--}}
            <th scope="col">@lang('info.expireAt')</th>
            <th scope="col">@lang('info.status')</th>
            <th scope="col">@lang('info.otherPossibilities')</th>
            <th scope="col">@lang('info.maxOnlineUser')</th>
            <th scope="col">@lang('info.op')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meetings as $meet)
            <tr>
                <td>{{$meet->title}}</td>
{{--                <td>{{$stringService->prettyNumber(jdate($meet->startAt)->format('%d %B  %Y'))}}</td>--}}
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
                    @if($meet->isActiveMic)
                        <i class="fas fa-microphone" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.isActiveMic')"></i>
                    @endif
                    @if($meet->isActiveWebcam)
                        <i class="fas fa-video" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.isActiveWebcam')"></i>
                    @endif
                    @if($meet->isActiveHalfPrice)
                        <i class="flaticon-piggy-bank" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.isActiveHalfPrice')"></i>
                    @endif
                    @if($meet->isActiveRecording)
                        <i class="far fa-save" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.isActiveRecording')"></i>
                    @endif
                </td>
                <td class="text-center">{{$stringService->prettyNumber($meet->maxUser)}} @lang('info.person')</td>
                <td>
                    @if($meet->status==0)
                        <a href="{{route('makePayment',['id'=>$meet->hash,'kind'=>'1'])}}"><button class="btn btn-success btn-sm"> <i class="fas fa-dollar-sign"></i> @lang('info.pay')</button> </a>
                    @else
                        <a href="{{route('orgQuickLogin',$meet->hash)}}" target="_blank" class="btn btn-icon btn-circle btn-light-success" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.loginMeeting')"><i class="fas fa-video"></i></a>
                        <a href="{{route('orgClassTeacher',$meet->hash)}}" class="btn btn-icon btn-circle btn-light-success" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.addTeacher')"><i class="fas fa-user-tie"></i></a>
                        <a href="{{route('orgClassStudent',$meet->hash)}}" class="btn btn-icon btn-circle btn-light-success" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.addStudent')"><i class="fas fa-user-graduate"></i> </a>
                        <a href="{{route('orgClassEdit',$meet->hash)}}" class="btn btn-icon btn-circle btn-light-success" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.editClass')"><i class="far fa-edit"></i> </a>
                        <a onclick="copyLink('http://{{$user->Organizer->domain}}/c/{{$meet->hash}}')" class="btn btn-icon btn-circle btn-light-success" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.copyLink')"><i class="far fa-copy"></i> </a>
                        <a href="{{route('makePayment',['id'=>$meet->hash,'kind'=>'1'])}}" class="btn btn-icon btn-circle btn-light-warning" data-container="body" data-toggle="popover" data-placement="top" data-content="@lang('info.renew')"><i class="flaticon2-refresh-button"></i> </a>
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