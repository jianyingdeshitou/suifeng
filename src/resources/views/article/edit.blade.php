@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Article</h2></div>

                <div class="panel-body">
                    {{-- 编辑文章 --}}
                    {!! Form::model($article, ['route' => [$route_update, $article->id], 'method'=>'PUT','class' => 'form-horizontal']) !!} 
                        {{-- input fields --}}
                        @include('article.partials.input_article')
                        {{-- 按钮 --}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {{-- 更新按钮 --}}
                                @include('partials.form.btn_submit', 
                                    [
                                        'icon' => '<span class="glyphicon glyphicon-save"></span> ',
                                        'text' => '更新',
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
