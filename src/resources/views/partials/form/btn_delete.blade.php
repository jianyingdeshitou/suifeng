{!! Form::open(['url' => $url, 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
	@include('partials.form.btn_submit', 
		[
			'icon' => $icon,
			'text' => $text,
			'class' => 'btn btn-danger',
		])
{!! Form::close() !!}