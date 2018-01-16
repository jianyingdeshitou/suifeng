@if (session('errors'))
    <div class="alert alert-danger">
    	<span class="glyphicon glyphicon-remove"></span>
        {{ session('errors') }}
    </div>
@endif