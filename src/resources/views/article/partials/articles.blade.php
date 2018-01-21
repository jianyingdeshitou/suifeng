<div>
{{-- 已登录 --}}
@auth()
	{{-- 新增按钮 --}}
	<a href="{{ route($routes['create']) }}" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus-sign"></span> 新增
	</a>
@endauth
</div>

<div>&nbsp;</div>

<div>
	<div>
	@foreach ($articles as $article)
	    <div>
	    	{{-- 标题 --}}
	        <a href="{{ route($routes['show'], ['id' => $article->id]) }}">
	        	<h3> {{ $article->title }} </h3>
	        </a>
	        @isset ($article->published_at)
	        	<em>({{ $article->published_at }})</em>
	        @endisset
            <p>
                {{ str_limit($article->content) }}
            </p>
	    </div>
	    
	    <div class='text-right'>
    	{{-- 具有更新权限 --}}
		@can('update', $article)
			{{-- 编辑按钮 --}}
			<a href="{{ route($routes['edit'], ['id' => $article->id]) }}" class="btn btn-primary">
				<span class="glyphicon glyphicon-edit"></span> 编辑
			</a>
		@endcan
		{{-- 具有删除权限 --}}
		@can('delete', $article)
			{{-- 删除按钮 --}}
			@include('partials.form.btn_delete', 
			[
				'url' => route($routes['destroy'], ['id' => $article->id]),
				'icon' => '<span class="glyphicon glyphicon-remove-sign"></span> ',
				'text' => '删除',
			])
		@endcan
		</div>
	    <hr>
	@endforeach
	</div>
	{{ $articles->links() }}
</div>