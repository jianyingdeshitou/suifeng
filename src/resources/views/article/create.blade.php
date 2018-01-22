@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>New Article</h2>
                </div>

                <div class="panel-body">
                    {{-- 新增文章 --}}
                    <form action="{{ route($routes['store']) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{-- input fields --}}
                        @include('article.partials.input_article')
                        {{-- 按钮 --}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {{-- 新增按钮 --}}
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus-sign"></span> 新增
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
