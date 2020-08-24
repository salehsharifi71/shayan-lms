@extends('layouts.panel')
@section('title') @lang('info.orgMeet') | @endsection
@section('subheader')   @endsection
@section('panelContent')
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
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Nick</td>
            <td>Stone</td>
            <td>
                <span class="label label-inline label-light-primary font-weight-bold">
                    Pending
                </span>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Ana</td>
            <td>Jacobs</td>
            <td>
                <span class="label label-inline label-light-success font-weight-bold">
                    Approved
                </span>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>Pettis</td>
            <td>
                <span class="label label-inline label-light-danger font-weight-bold">
                    New
                </span>
            </td>
        </tr>
        </tbody>
    </table>
        </div>
    </div>
    </div>

@endsection