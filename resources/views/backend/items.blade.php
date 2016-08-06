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
		<edititem :item="current" :index="index" :cats="cats"></edititem>	
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
		<button v-show="current===''" v-on:click="current = {available:'1',category_id:'{{$cat->id}}'}"
			class="btn btn-success btn-lg" >
			<span class="glyphicon glyphicon-plus"></span>  
			Add Item
		</button>
	</div>
</div>
<hr>

<div class="row">
	<h3>
		<span class="glyphicon glyphicon-tag"></span> &nbsp;&nbsp;  
		{{$cat->name}}
	</h3>

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

@include('backend.templates.editItem')


@section('scripts')
<script>
	var items = <?php echo json_encode($items); ?>;
</script>
<script src="/js/backend/items.js"> </script>

@stop
@stop