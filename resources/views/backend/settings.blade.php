@extends('layouts.back')

@section('title', ' - Manage Subscriptions')

@section('content')

<div class="col-md-10 col-md-offset-1">
	<table class="table-stiped">
		@foreach($subscriptions as $sub)	
			<form action="">
				<tr>
					<td>{{ $sub->name }}</td>
					<td>
						<input  id="{{$sub->name}}" value="{{$sub->interest}}" 
							type="text" class="form-control qtyBox" required>
					</td>
					<td>%</td>
					<td>
						<button type="submit" class="btn btn-success"> Save </button>
					</td>
				</tr>
			</form>
		@endforeach
	</table>
</div>

@stop