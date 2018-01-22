{{-- title --}}
@php 
    $id = 'title'; 
    $title = old($id) ?: $article->title;
@endphp
<div class="form-group  {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">标题</label>
        {{-- INPUT --}}
        <input type="text" name="{{ $id }}" id="{{ $id }}" class="form-control" placeholder="请输入标题" value="{{$title}}" required autofocus>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- content --}}
@php 
    $id = 'content'; 
    $content = old($id) ?: $article->content;
@endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label for="{{ $id }}">内容</label>
        {{-- INPUT --}}
        <textarea name="{{ $id }}" id="{{ $id }}" class="form-control" placeholder="请输入内容" rows=10 required>{{$content}}</textarea>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- published --}}
@php
    $id='published'; 
    $published = old($id) ?: $article->published;
@endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        <label class="radio-inline">
            <input type="radio" name="{{$id}}" id="{{$id}}" value="1" 
            @if ($published)
                checked
            @endif> 发布
        </label>
        <label class="radio-inline">
            <input type="radio" name="{{$id}}" id="{{$id}}" value="1" 
            @if (!$published)
                checked
            @endif> 不发布
        </label>
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

