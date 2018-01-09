@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $article->title }}</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <span class="glyphicon glyphicon-user"></span>
                        <span>{{ $article->user->name }}</span> |
                        <span>{{ $article->updated_at }}</span>
                    </div>
                    <br>
                    <div>
                        {{ $article->content }}
                    </div>
                    <hr>
                    <div class="text-right">
                    {{-- 具有更新权限 --}}
                    @can('update', $article)
                        {{-- 编辑按钮 --}}
                        @include('partials.html.btn_primary', 
                        [
                            'url' => route('articles.edit', ['id' => $article->id]),
                            'icon' => '<span class="glyphicon glyphicon-edit"></span> ',
                            'text' => '编辑',
                        ])
                    @endcan
                    {{-- 具有删除权限 --}}
                    @can('delete', $article)
                        {{-- 删除按钮 --}}
                        @include('partials.form.btn_delete', 
                        [
                            'url' => route('articles.destroy', ['id' => $article->id]),
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
