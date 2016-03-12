@extends('layouts.back')


@section('content')
<form class="form-horizontal" method="post" action="/backend/categories/">
	{!! csrf_field() !!}
	<!-- Name -->
	<div class="form-group">		
		<label class="col-sm-2 control-label" for="name">Name</label>
		<div class="col-sm-10">
			<input 
				type="text" name='name' class="form-control" >
		</div>
	</div>

	<!-- Available -->
	<div class="form-group">
		<label class="col-sm-2 control-label" for="available">Availablity</label>
		
		<div class="col-sm-10">
			<select 
				class="form-control" id="available" name="available">
                <option value="1">Yes</option>
                <option value="0">N/A</option>
            </select>
		</div>
	</div>

	<!-- Save/update -->
	<span class="pull-right">
		<button  type ="submit" class="btn btn-success">
			Save
		</button>
		<button class="btn btn-warning">
			Cancel
		</button>
	</span>	
</form>
<br>
<hr><hr>
<br>
<form class="form-horizontal" method="post" action="/backend/items/">
	{!! csrf_field() !!}
	<!-- Name -->
	<div class="form-group">		
		<label class="col-sm-2 control-label" for="name">Name</label>
		<div class="col-sm-10">
			<input 
				type="text" name='name' class="form-control" >
		</div>
	</div>

	<!-- Price -->
	<div class="form-group">		
		<label class="col-sm-2 control-label" for="price">Price</label>
		<div class="col-sm-10">
			<input 
				type="number" name='price' class="form-control" >
		</div>
	</div>
	
	<!-- Category -->
	<div class="form-group">
		<label class="col-sm-2 control-label" for="category">Availablity</label>
		
		<div class="col-sm-10">
			<select 
				class="form-control" id="category" name="category">
                <option value="1">Food</option>
                <option value="2">Drink</option>
                <option value="3">Furniture</option>
            </select>
		</div>
	</div>

	<!-- QTY -->
	<div class="form-group">		
		<label class="col-sm-2 control-label" for="qty">Quantity</label>
		<div class="col-sm-10">
			<input 
				type="number" name='qty' class="form-control" >
		</div>
	</div>

	<!-- Available -->
	<div class="form-group">
		<label class="col-sm-2 control-label" for="available">Availablity</label>
		
		<div class="col-sm-10">
			<select 
				class="form-control" id="available" name="available">
                <option value="1">Yes</option>
                <option value="0">N/A</option>
            </select>
		</div>
	</div>

	<!-- Save/update -->
	<span class="pull-right">
		<button  type ="submit" class="btn btn-success">
			Save
		</button>
		<button class="btn btn-warning">
			Cancel
		</button>
	</span>	
</form>













@stop