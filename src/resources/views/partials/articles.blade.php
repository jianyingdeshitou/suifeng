<div>
@auth()
    @include('partials.html.btn_primary', 
    	[
    		'url' => route('articles.create'),
    		'icon' =>  '<span class="glyphicon glyphicon-plus-sign"></span> ',
    		'text' => '增加',
    	])
@endauth
</div>

<div>&nbsp;</div>

<div>
	<div>
	@foreach ($articles as $article)
	    <div>
	        <a href=""><h3> {{ $article->title }} </h3></a>
	        ({{ $article->updated_at }})
	    </div>
	    
	    <div class='text-right'>
		@can('update', $article)
			@include('article.partials.btn_edit')
		@endcan
		@can('delete', $article)
			@include('article.partials.btn_delete')
		@endcan
		</div>
	    <hr>
	@endforeach
	</div>
	{{ $articles->links() }}
</div>