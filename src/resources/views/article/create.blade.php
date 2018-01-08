@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>New Article</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
{{--  --}}
{!! Form::open(['route' => 'articles.store', 'class' => 'form-horizontal']) !!} 

{!! Form::close() !!} 
{{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
