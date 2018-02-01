@extends('layouts.app')

@section('content')
<div class="container">
    {{-- 顶部工具栏 --}}
    <div class="row page-title-row">
        <div class="col-md-6">
            <h3 class="pull-left">Uploads </h3>
            <div class="pull-left">
                <ul class="breadcrumb">
                    @foreach ($breadcrumbs as $path => $disp)
                        <li><a href="{{ route('upload.index', ['folder' => $path ]) }}">{{ $disp }}</a></li>
                    @endforeach
                    <li class="active">{{ $folderName }}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-folder-create">
                <i class="glyphicon glyphicon-plus-sign"></i> New Folder
            </button>
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload">
                <i class="glyphicon glyphicon-open"></i> Upload
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            @include('partials.html.alert_errors')
            @include('partials.html.alert_success')

            <table id="uploads-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Size</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                </thead>
                <tbody>

                {{-- 子目录 --}}
                @foreach ($subfolders as $path => $name)
                    <tr>
                        <td>
                            <a href="{{ route('upload.index', ['folder' => $path ]) }}">
                                <i class="glyphicon glyphicon-folder-close" style="color:yellow;"></i>
                                {{ $name }}
                            </a>
                        </td>
                        <td>Folder</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" onclick="delete_folder('{{ $name }}')">
                                <i class="glyphicon glyphicon-remove-sign"></i>
                                Delete
                            </button>
                         </td>
                    </tr>
                @endforeach

                {{-- 所有文件 --}}
                @foreach ($files as $file)
                    <tr>
                        <td>
                            <a href="{{ $file['webPath'] }}">
                                @if ($file['is_image'])
                                <i class="glyphicon glyphicon-picture" style="color:gray;"></i>
                                @else
                                <i class="glyphicon glyphicon-file" style="color:gray;"></i>
                                @endif
                                {{ $file['name'] }}
                            </a>
                        </td>
                        <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                        <td>{{ $file['modified']->format('Y-m-d g:ia') }}</td>
                        <td>{{ $file['human_filesize'] }}</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger" onclick="delete_file('{{ $file['name'] }}')">
                                <i class="glyphicon glyphicon-remove-sign"></i>
                                Delete
                            </button>
                            @if ($file['is_image'])
                                <button type="button" class="btn btn-xs btn-success" onclick="preview_image('{{ $file['webPath'] }}')">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                    Preview
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@include('upload.partials.modals')

@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
    // 确认文件删除
    function delete_file(name) {
        $("#delete-file-name1").html(name);
        $("#delete-file-name2").val(name);
        $("#modal-file-delete").modal("show");
    }

    // 确认目录删除
    function delete_folder(name) {
        $("#delete-folder-name1").html(name);
        $("#delete-folder-name2").val(name);
        $("#modal-folder-delete").modal("show");
    }

    // 预览图片
    function preview_image(path) {
        $("#preview-image").attr("src", path);
        $("#modal-image-view").modal("show");
    }
    </script>
@endsection
