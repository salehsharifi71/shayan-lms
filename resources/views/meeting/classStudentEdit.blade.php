@extends('layouts.panel')
@section('title') @lang('info.addStudent') | @endsection
@section('subheader') @lang('info.addStudent')  @endsection
@section('panelContent')
    @inject('stringService', 'App\Services\StringService')

    <div class="col-md-6">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">@lang('info.thisClassStd')</h3>
            </div>
            <div class="card-toolbar">

                <button type="button" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal" data-target="#addStdModal">
                    <i class="flaticon-plus"></i>@lang('info.addNewStd')
                </button>
            </div>
        </div>
        <div class="card-body" id="classStd">
                <div id="otEmpty" @if(count($clientInClass)>0) style="display: none" @endif>
                    @lang('info.emptyList')
                </div>
                @foreach($clientInClass as $client)

                    <div class="d-flex align-items-center mb-10" id="client{{$client->Client->id}}">
                        <!--begin::Symbol-->
                        <div class="symbol mr-3">
                            <span class="symbol-label font-size-h5">{{$stringService->findSymbol($client->Client->name)}}</span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <span  class="text-dark text-hover-primary mb-1 font-size-lg">{{$client->Client->name}}</span>
                            <span class="text-muted">@lang('info.signUp'): {{$stringService->prettyNumber(jdate($client->Client->created_at)->format('%d %B  %Y'))}}</span>
                        </div>
                        <!--end::Text-->
                        <!--begin::Dropdown-->
                        <div id="btn{{$client->Client->id}}" class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="@lang('info.removeStdFromClass')">
                            <a  onclick="removeFromClass('{{$meet->hash}}',{{$client->Client->id}})" class="btn btn-hover-light-danger btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-cancel"></i>
                            </a>
                        </div>
                        <!--end::Dropdown-->
                    </div>
                @endforeach
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">@lang('info.otherOfStd')</h3>
            </div>

        </div>
        <div class="card-body" id="OtherStd" >
            <div id="otEmpty" @if(count($otherClient)>0) style="display: none" @endif>
                @lang('info.emptyList')
        </div>

                @foreach($otherClient as $client)

                    <div class="d-flex align-items-center mb-10" id="client{{$client->id}}">
                        <!--begin::Symbol-->
                        <div class="symbol mr-3">
                            <span class="symbol-label font-size-h5">{{$stringService->findSymbol($client->name)}}</span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <span  class="text-dark text-hover-primary mb-1 font-size-lg">{{$client->name}}</span>
                            <span class="text-muted">@lang('info.signUp'): {{$stringService->prettyNumber(jdate($client->created_at)->format('%d %B  %Y'))}}</span>
                        </div>
                        <!--end::Text-->
                        <!--begin::Dropdown-->
                        <div id="btn{{$client->id}}" class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="@lang('info.addStdToClass')">
                            <a  onclick="addToClass('{{$meet->hash}}',{{$client->id}})" class="btn btn-hover-light-success btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-plus"></i>
                            </a>
                        </div>
                        <!--end::Dropdown-->
                    </div>
                @endforeach
        </div>
    </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="addStdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('info.addNewStd')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addUser')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>@lang('info.placeholderName') <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control " required="">
                        </div>
                        <div class="form-group">
                            <label>@lang('info.userName') <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control " required="">
                            <span class="text-muted">@lang('info.userNameHint')</span>
                        </div>
                        <div class="form-group">
                            <label>@lang('info.placeholderPass') <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control " required="">
                        </div>
                        <input type="hidden" value="0" name="role">
                        <input type="hidden" value="{{$meet->hash}}" name="class">
                        <button type="submit" class="btn btn-success btn-lg " > @lang('info.save')</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script>
    function removeFromClass(hash,id){
        document.getElementById('btn'+id).innerHTML='<i class="spinner spinner-track spinner-danger mr-15"></i>';
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                var text='';
                var obj = JSON.parse(this.responseText);
                if(obj['result']=='ok'){
                    document.getElementById('btn'+id).innerHTML='<a  onclick="addToClass(\'{{$meet->hash}}\','+id+')" class="btn btn-hover-light-success btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-plus"></i> </a>';
                    document.getElementById('btn'+id).setAttribute("data-original-title","@lang('info.addStdToClass')");
                    var myobj=document.getElementById('client'+id);
                    document.getElementById("OtherStd").appendChild(myobj);
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
                    toastr.success(obj['msg']);
                }else{
                    document.getElementById('btn'+id).innerHTML='<a  onclick="removeFromClass(\'{{$meet->hash}}\','+id+')" class="btn btn-hover-light-danger btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-cancel"></i></a>';
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
                    toastr.error(obj['msg']);
                }

            }
        };
        xmlhttp.open("GET","{{route('changeUser',['id'=>$meet->hash,'action'=>'remove'])}}?client="+id,true);
        xmlhttp.send();
    }
    function addToClass(hash,id){
        document.getElementById('btn'+id).innerHTML='<i class="spinner spinner-track spinner-danger mr-15"></i>';
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                var text='';
                var obj = JSON.parse(this.responseText);
                if(obj['result']=='ok'){
                    document.getElementById('btn'+id).innerHTML='<a  onclick="removeFromClass(\'{{$meet->hash}}\','+id+')" class="btn btn-hover-light-danger btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-cancel"></i></a>';

                    document.getElementById('btn'+id).setAttribute("data-original-title","@lang('info.removeStdFromClass')");
                    var myobj=document.getElementById('client'+id);
                    document.getElementById("classStd").appendChild(myobj);
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
                    toastr.success(obj['msg']);
                }else{
                    document.getElementById('btn'+id).innerHTML='<a  onclick="addToClass(\'{{$meet->hash}}\','+id+')" class="btn btn-hover-light-success btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-plus"></i> </a>';
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
                    toastr.error(obj['msg']);
                }

            }
        };
        xmlhttp.open("GET","{{route('changeUser',['id'=>$meet->hash,'action'=>'add'])}}?client="+id,true);
        xmlhttp.send();
    }
    </script>
@endsection