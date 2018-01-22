@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $article->title }}</h2></div>

                <div class="panel-body">
                    @include('partials.html.alert_success')
                    @include('partials.html.alert_errors')
                    
                    <div>
                        <span class="glyphicon glyphicon-user"></span>
                        <span>{{ $article->user->name }}</span> 
                        @isset ($article->published_at)
                          | <span>{{ $article->published_at }}</span>
                        @endisset
                    </div>
                    <br>
                    <div>
                        {!! nl2br(e($article->content)) !!}
                    </div>
                    <hr>
                    <div class="text-right">
                    {{-- 具有更新权限 --}}
                    @can('update', $article)
                        {{-- 编辑按钮 --}}
                        <a href="{{ route($routes['edit'], ['id' => $article->id]) }}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span> 编辑
                        </a>
                    @endcan
                    {{-- 具有删除权限 --}}
                    @can('delete', $article)
                        {{-- 删除按钮 --}}
                        @include('partials.form.btn_delete', 
                        [
                            'url' => route($routes['destroy'], ['id' => $article->id]),
                            'icon' => '<span class="glyphicon glyphicon-remove-sign"></span> ',
                            'text' => '删除',
                        ])
                    @endcan
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
