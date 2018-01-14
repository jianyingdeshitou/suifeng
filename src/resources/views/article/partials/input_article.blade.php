{{-- title --}}
@php $id='title'; @endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        {{-- INPUT --}}
        {!! Form::text($id, null, 
            [
                'class' => 'form-control', 
                'placeholder' => '请输入标题',
                'required', 
                'autofocus',
            ]) !!}
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>

{{-- content --}}
@php $id='content'; @endphp
<div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
    <div class="col-md-8 col-md-offset-2">
        {{-- INPUT --}}
        {!! Form::textarea($id, null, 
            [
                'class' => 'form-control', 
                'placeholder' => '请输入内容',
                'rows' => '10',
            ]) !!}
        {{--错误信息--}}
        @if ($errors->has($id))
            <span class="help-block">
                <strong>{{ $errors->first($id) }}</strong>
            </span>
        @endif
    </div>
</div>