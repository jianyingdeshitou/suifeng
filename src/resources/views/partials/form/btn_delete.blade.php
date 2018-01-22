<form action="{{ $url }}" method="POST" style="display: inline;">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
	{{-- delete --}}
	<button type="submit" class="btn btn-danger">
	    {!! $icon !!}
	    {{ $text }}
	</button>
</form>