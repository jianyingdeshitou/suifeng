@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3>Tags <small>» Create New Tag </small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Tag Form</h3>
                </div>
                
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('tag.store') }}">
                            {{ csrf_field() }}

                            @include('tag.partials.input_tag', ['from' => 'create'])
                            {{-- 添加按钮 --}}
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        Add New Tag
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
