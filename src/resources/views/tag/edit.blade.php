@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3>Tags <small>» Edit New Tag </small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Tag Form</h3>
                </div>
                
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('tag.update', $tag->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @include('tag.partials.input_tag', ['from' => 'edit'])
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
