{!! Form::open(['url' => $url, 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
	{!! Form::button($icon.$text, ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
{!! Form::close() !!}