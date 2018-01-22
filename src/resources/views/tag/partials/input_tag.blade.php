{{-- tag --}}
@php 
    $id = 'tag'; 
    $name = old($id) ?: $tag->tag;
    $autofocus = ($from === 'create') ? 'autofocus' : '';
    $readonly = ($from === 'edit') ? 'readonly' : '';
@endphp
<div class="form-group  {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">标签</label>
        {{-- INPUT --}}
        <input type="text" name="{{ $id }}" id="{{ $id }}" class="form-control" placeholder="请输入标题" value="{{$name}}" required {{$autofocus}} {{$readonly}} >
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- title --}}
@php 
    $id = 'title'; 
    $title = old($id) ?: $tag->title;
    $autofocus = ($from === 'edit') ? 'autofocus' : '';
@endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">标题</label>
        {{-- INPUT --}}
        <input type="text" class="form-control" name="{{$id}}" id="{{$id}}" value="{{ $tag->title }}" required {{$autofocus}}>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- subtitle --}}
@php 
    $id = 'subtitle'; 
    $subtitle = old($id) ?: $tag->subtitle;
@endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">子标题</label>
        {{-- INPUT --}}
        <input type="text" class="form-control" name="{{$id}}" id="{{$id}}" value="{{ $tag->subtitle }}" required>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- meta_description --}}
@php 
    $id = 'meta_description'; 
    $meta_description = old($id) ?: $tag->meta_description;
@endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">Meta Description</label>
        <textarea class="form-control" id="{{ $id }}" name="{{ $id }}" rows="3" required>{{ $tag->meta_description }}</textarea>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- page_image --}}
@php 
    $id = 'page_image'; 
    $page_image = old($id) ?: $tag->page_image;
@endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">图片</label>
        {{-- INPUT --}}
        <input type="text" class="form-control" name="{{$id}}" id="{{$id}}" value="{{ $tag->page_image }}" required>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>