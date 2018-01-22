@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3>Tags <small>» Listing</small></h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('tag.create') }}" class="btn btn-success btn-md">
                <i class="glyphicon glyphicon-plus-sign"></i> 添加标签
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Tags</h2></div>

                <div class="panel-body">
                    @include('partials.html.alert_success')
                    @include('partials.html.alert_errors')

                    <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tag</th>
                            <th>Title</th>
                            <th class="hidden-sm">Subtitle</th>
                            <th class="hidden-md">Page Image</th>
                            <th class="hidden-md">Meta Description</th>
                            {{-- <th class="hidden-md">Layout</th> --}}
                            {{-- <th class="hidden-sm">Direction</th> --}}
                            <th data-sortable="false">Actions</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->tag }}</td>
                            <td>{{ $tag->title }}</td>
                            <td class="hidden-sm">{{ $tag->subtitle }}</td>
                            <td class="hidden-md">{{ $tag->page_image }}</td>
                            <td class="hidden-md">{{ $tag->meta_description }}</td>
                            {{-- <td class="hidden-md">{{ $tag->layout }}</td> --}}
                            {{-- <td class="hidden-sm">
                                @if ($tag->reverse_direction)
                                    Reverse
                                @else
                                    Normal
                                @endif
                            </td> --}}
                            <td>
                                <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </a>
                                            {{-- 删除按钮 --}}
                                @include('partials.form.btn_delete', 
                                [
                                    'url' => route('tag.destroy', $tag->id),
                                    'icon' => '<span class="glyphicon glyphicon-remove-sign"></span> ',
                                    'text' => '删除',
                                ])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
