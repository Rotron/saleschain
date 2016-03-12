@extends('layouts.back')

@section('content')
<div class="row">
	@if($waiting > 0)
	<div class="col-md-4 col-md-offset-4">
		<p class="alert alert-success"> 
			<span class="glyphicon glyphicon-bullhorn"></span> 
			<b class="pull-right clickable" onclick="$('.alert').fadeOut();">X</b>	
			<span>
				<b style="color: white;"> Attention:</b>
				<br> 
				{{ $waiting}} new request(s) awaiting approval 
			</span>
		</p>
	</div>
	@endif
</div>	

<hr>

<div class="row">
	
	<div class="col-md-6 col-md-offset-4">
		<a href="/backend/users" class="btn btn-lg btn-info">
			<span class="glyphicon glyphicon-user"></span> 
			Manage Clients
		</a>
		
		&nbsp;

		<a href="/backend/categories" class="btn btn-lg btn-info">
			<span class="glyphicon glyphicon-shopping-cart"></span> 
			Manage Store
		</a>
	</div>
</div>
@stop