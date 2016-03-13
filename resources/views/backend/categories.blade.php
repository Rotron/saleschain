@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<input v-model="search" class='form-control' placeholder="Search categories">
		<br>
	</div>
</div>

<div class="row" v-show="current != ''">
	<hr>
	<div class="col-md-6 col-md-offset-3">
		<!-- vue component -->
		<editcat :cat="current" :index="index"></editcat>	
	</div>	
</div>
<div class="row">
	<div class="col-md-3" v-show="current == ''">
		<a href="/backend" class="btn btn-lg">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Dashboard &nbsp;
			<span class="glyphicon glyphicon-dashboard"></span>
		</a>
	</div>
	<div class="col-md-3 pull-right">
		<button v-show="current===''" v-on:click="current = {available:'1'}"
			class="btn btn-success btn-lg" >
			<span class="glyphicon glyphicon-plus"></span>  
			Add Category
		</button>
	</div>
</div>
<hr>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped">
			<thead>
				<tr>
					<th><h4>Category</h4></th>
					<th><h4>Availablity</h4></th>
					<th><h4>Items</h4></th>
					<th><h4>Options</h4></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for = "(index, cat) in cats | filterBy search" >
		    		<td> @{{ cat.name }} </td>
		        	<td> 
		        		<span v-if="cat.available == 1"> Yes </span> 
		        		<span v-else> No </span> 					
		        	</td>
		        	<td> 
						<a href="/backend/categories/@{{cat.id}}" class="btn btn-xs">
							<b>@{{cat.name}}'s Items </b>
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</td>					
		        	<td>
		            	<button class="btn btn-xs btn-info glyphicon glyphicon-pencil"
		            		v-on:click="editCat(index)">
		            	</button> 
		            	&nbsp;&nbsp;
		            	<button class="btn btn-xs btn-danger glyphicon glyphicon-trash"
		            		v-on:click="deleteCat(index)">
		            	</button>
		            </td>		
				</tr>
			</tbody>
		</table>
	</div>
</div>


@include('backend.templates.editCat')


@section('scripts')
<script src="/js/backend/categories.js"> </script>

@stop
@stop