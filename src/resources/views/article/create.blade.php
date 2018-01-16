@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>New Article</h2></div>

                <div class="panel-body">
                    {{-- 新增文章 --}}
                    {!! Form::open(['route' => $route_store, 'class' => 'form-horizontal']) !!} 
                        {{-- input fields --}}
                        @include('article.partials.input_article')
                        {{-- 按钮 --}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {{-- 新增按钮 --}}
                                @include('partials.form.btn_submit', 
                                    [
                                        'icon' => '<span class="glyphicon glyphicon-plus-sign"></span> ',
                                        'text' => '新增',
                                        'class' => 'btn btn-primary ',
                                    ])
                            </div>
                        </div>
                    {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
