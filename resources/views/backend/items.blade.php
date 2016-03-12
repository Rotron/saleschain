@extends('layouts.back')

@section('title', 'Items')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<input v-model="search" class='form-control' placeholder="Search items">
		<br>
	</div>
</div>

<div class="row" v-show="current != ''">
	<hr>
	<div class="col-md-6 col-md-offset-3">
		<!-- vue component -->
		<editcat :item="current" :index="index" :cats="cats"></editcat>	
	</div>	
</div>
<div class="row">
	<div class="col-md-3" v-show="current == ''">
		<a href="/backend/categories" class="btn btn-lg">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Categories&nbsp;&nbsp;
			<span class="glyphicon glyphicon-tags"></span>
		</a>
	</div>
	<div class="col-md-3 pull-right">
		<button v-show="current===''" v-on:click="current = {available:'1'}"
			class="btn btn-success btn-lg" >
			<span class="glyphicon glyphicon-plus"></span>  
			Add Item
		</button>
	</div>
</div>
<hr>

<div class="row">
	<h3><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;  {{$cat->name}}</h3>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped">
			<thead>
				<tr>
					<th><h4>Name</h4></th>
					<th><h4>Price</h4></th>
					<th><h4>Qty</h4></th>
					<th><h4>Availablity</h4></th>
					<th><h4>Options</h4></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for = "(index, item) in items | filterBy search" >
		    		<td> @{{ item.name }} </td>
		    		<td> @{{ item.price }} </td>
		    		<td> @{{ item.qty }} </td>
		        	<td> 
		        		<span v-if="item.available == 1"> Yes </span> 
		        		<span v-else> No </span> 					
		        	</td>				
		        	<td>
		            	<button class="btn btn-xs btn-info glyphicon glyphicon-pencil"
		            		v-on:click="editItem(index)">
		            	</button> 
		            	&nbsp;&nbsp;
		            	<button class="btn btn-xs btn-danger glyphicon glyphicon-trash"
		            		v-on:click="deleteItem(index)">
		            	</button>
		            </td>		
				</tr>
			</tbody>
		</table>
	</div>
</div>

<!-- 
**   Edit User Component Template   **
									-->
<template id="edit-item">
	<form class="form-horizontal">
		<!-- Name -->
		<div class="form-group">		
			<label class="col-sm-2 control-label" for="name">Name</label>
			<div class="col-sm-10">
				
				<input v-model="item.name" value="@{{ item.name }}"
					type="text" id='name' class="form-control" >
			</div>
		</div>

		<!-- Price -->
		<div class="form-group">		
			<label class="col-sm-2 control-label" for="price">Price</label>
			<div class="col-sm-10">
				
				<input v-model="item.price" value="@{{ item.price }}"
					type="number" name='price' class="form-control" >
			</div>
		</div>
		
		<!-- Category -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="category">Category</label>
			
			<div class="col-sm-10">
				
				<select v-model="item.category_id"
					class="form-control" id="category" name="category">
	                
	                <option v-for="cat in cats" v-bind:value="cat.id">
						@{{ cat.name }}
					</option>
	            </select>
			</div>
		</div>

		<!-- QTY -->
		<div class="form-group">		
			<label class="col-sm-2 control-label" for="qty">Quantity</label>
			<div class="col-sm-10">
				
				<input v-model="item.qty" value="@{{ item.qty }}"
					type="number" name='qty' class="form-control" >
			</div>
		</div>
		<!-- Available -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="available">Availablity</label>
			
			<div class="col-sm-10">
				
				<select v-model="item.available"
					class="form-control" id="available" name="available">
	                <option value="1">Yes</option>
	                <option value="0">N/A</option>
	            </select>
			</div>
		</div>

		<!-- Save/update -->
		<span class="pull-right">
			<button v-on:click="save($event, index)" class="btn btn-success">
				Save
			</button>
			<button v-on:click="cancel($event)" class="btn btn-warning">
				Cancel
			</button>
		</span>	
	</form>
</template>
<!-- End of Template -->

@section('scripts')
<script>
	var items = <?php echo json_encode($items); ?>;
</script>
<script src="/js/vBackendItems.js"> </script>

@stop
@stop