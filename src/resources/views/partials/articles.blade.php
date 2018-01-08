<div>
@auth()
    <a href="{{ route('home') }}" class="btn btn-primary">
    	<span class="glyphicon glyphicon-plus-sign"></span>
    	&nbsp;增加
    </a>
@endauth
</div>
<div>&nbsp;</div>

<div>
@foreach ($articles as $article)
    <div>
        <a href=""><h3> {{ $article->title }} </h3></a>
        ({{ $article->updated_at }})
    </div>
    <div class='text-right'>
	@can('update', $article)
	    <a href="{{ route('home') }}" class="btn btn-primary">
	    	<span class="glyphicon glyphicon-edit"></span>
	    	&nbsp;编辑
	    </a>
	@endcan
	@can('delete', $article)
	    <a href="{{ route('home') }}" class="btn btn-danger">
	    	<span class="glyphicon glyphicon-remove-sign"></span>
	    	&nbsp;删除
	    </a>
	@endcan
	</div>
    <hr>
@endforeach
</div>
{{ $articles->links() }}
</div>