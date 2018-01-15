<div>
{{-- 已登录 --}}
@auth()
	{{-- 新增按钮 --}}
	@include('partials.html.btn_primary', 
	[
		'url' => route($route_create),
		'icon' =>  '<span class="glyphicon glyphicon-plus-sign"></span> ',
		'text' => '新增',
	])
@endauth
</div>

<div>&nbsp;</div>

<div>
	<div>
	@foreach ($articles as $article)
	    <div>
	    	{{-- 标题 --}}
	        <a href="{{ route($route_show, ['id' => $article->id]) }}">
	        	<h3> {{ $article->title }} </h3>
	        </a>
            <em>({{ $article->published_at }})</em>
            <p>
                {{ str_limit($article->content) }}
            </p>
	    </div>
	    
	    <div class='text-right'>
    	{{-- 具有更新权限 --}}
		@can('update', $article)
			{{-- 编辑按钮 --}}
			@include('partials.html.btn_primary', 
			[
				'url' => route($route_edit, ['id' => $article->id]),
				'icon' => '<span class="glyphicon glyphicon-edit"></span> ',
				'text' => '编辑',
			])
		@endcan
		{{-- 具有删除权限 --}}
		@can('delete', $article)
			{{-- 删除按钮 --}}
			@include('partials.form.btn_delete', 
			[
				'url' => route($route_destroy, ['id' => $article->id]),
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