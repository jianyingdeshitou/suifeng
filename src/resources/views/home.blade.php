@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Articles</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                    @foreach ($articles as $article)
                        <li>
                            <a href=""> {{ $article->title }} </a>
                            <span class="glyphicon glyphicon-user"></span>
                            {{ $article->user->name }}
                        </li>
                    @endforeach
                    </ul>
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
