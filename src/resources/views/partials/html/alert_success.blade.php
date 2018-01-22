@if (session('success'))
    <div class="alert alert-success">
    	<span class="glyphicon glyphicon-ok"></span>
        {{ session('success') }}
    </div>
@endif
