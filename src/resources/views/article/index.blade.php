@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Articles</h2></div>

                <div class="panel-body">
                    @include('partials.html.alert_success')
                    @include('partials.html.alert_errors')

                    @include('article.partials.articles')
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
