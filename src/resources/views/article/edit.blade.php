@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Edit Article</h2></div>

                <div class="panel-body">
                    {{-- form --}}
                    <form action="{{ route($routes['update'], $article->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        {{-- input fields --}}
                        @include('article.partials.input_article')
                        {{-- 按钮 --}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {{-- 更新按钮 --}}
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-save"></span> 更新
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
