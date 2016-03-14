@extends('layouts.back')

@section('content')
<div class="row">
	@if($waiting > 0)
	<div class="col-md-4 col-md-offset-4">
		<p class="alert alert-success"> 
			<span class="glyphicon glyphicon-bell"></span> 
			<b class="pull-right clickable" onclick="$('.alert').fadeOut();">X</b>	
			<span>
				<b style="color: white;"> Notifications:</b>
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
<br><br><hr><br>
<div class="row">

<div class="col-md-4 col-md-offset-4">
	<h3>% Subscriptions' Rates:</h3>
	<table class="table">
		@foreach($subscriptions as $sub)	
			<form class="form-inline" action="/backend/changeSub" method="POST">
				{!! csrf_field() !!}
				<input type="hidden" id='id' name='id' value="{{$sub->id}}">
				<tr>
					<td>{{ $sub->name }}</td>
					<td width="10%;">

						<input  id="interest" name='interest' value="{{$sub->interest}}" 
							type="text" class="form-control qtyBox" required>
					</td>					
					<td>
						<button type="submit" class="btn btn-success"> 
							<span class="glyphicon glyphicon-ok-circle"></span> 
							Save 
						</button>
					</td>
				</tr>
			</form>
		@endforeach
	</table>
</div>

</div>
@stop