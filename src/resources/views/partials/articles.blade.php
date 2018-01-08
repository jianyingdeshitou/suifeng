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
<ul>
@foreach ($articles as $article)
    <li>
        <a href=""> {{ $article->title }} </a>
        ({{ $article->updated_at }})
		@can('update', $article)
		    <a href="{{ route('home') }}" class="btn btn-primary">
		    	<span class="glyphicon glyphicon-edit"></span>
		    	&nbsp;编辑
		    </a>
		@endcan
		@can('delete', $article)
		    <a href="{{ route('home') }}" class="btn btn-primary">
		    	<span class="glyphicon glyphicon-remove-sign"></span>
		    	&nbsp;删除
		    </a>
		@endcan
    </li>
@endforeach
</ul>
{{ $articles->links() }}
</div>