@extends('layouts.panel')
@section('title') @lang('info.articles') | @endsection
@section('subheader') @lang('info.articles')  @endsection
@section('panelContent')
    @inject('stringService', 'App\Services\StringService')

    <div class="col-md-12">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">@lang('info.articles')</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{route('articleEdit',0)}}" class="btn btn-sm btn-success font-weight-bold">
                    <i class="flaticon-plus"></i>@lang('info.addNewArticle')</a>
            </div>
        </div>
        <div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">@lang('info.title')</th>
            <th scope="col">@lang('info.publishDate')</th>
            <th scope="col">@lang('info.op')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->title}}</td>
                <td>{{$stringService->prettyNumber(jdate($article->created_at)->format('%d %B  %Y'))}}</td>
               <td>
                        <a href="{{route('articleEdit',$article->id)}}"><button class="btn btn-success btn-sm"> <i class="fas fa-edit"></i> @lang('info.editArticle')</button> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
            {{$articles->links()}}
        </div>
    </div>
    </div>

@endsection