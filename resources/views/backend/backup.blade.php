@extends('layouts.back')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<input v-model="search" class='form-control' placeholder="Search users">
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

<hr>

<div class="row">
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
					<a href="/backend/categories/@{{cat.id}}">
						@{{cat.name}}'s Items 
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</td>					
	        	<td>
	            	<button class="btn btn-xs btn-info glyphicon glyphicon-pencil"
	            		v-on:click="editUser(index)">
	            	</button> 
	            	&nbsp;&nbsp;
	            	<button class="btn btn-xs btn-danger glyphicon glyphicon-trash"
	            		v-on:click="deleteUser(index, user.id)">
	            	</button>
	            </td>		
			</tr>
		</tbody>
	</table>
</div>

<!-- 
**   Edit User Component Template   **
									-->
<template id="edit-cat">
	<form class="form-horizontal">
		<!-- Name -->
		<div class="form-group">		
			<label class="col-sm-2 control-label" for="name">Name</label>
			<div class="col-sm-10">
				<input v-model="cat.name" value="@{{ cat.name }}"
					type="text" id='name' class="form-control" >
			</div>
		</div>

		<!-- Available -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="available">Availablity</label>
			
			<div class="col-sm-10">
				<select v-model="cat.available"
					class="form-control" id="available" name="available">
	                <option value="1">Yes</option>
	                <option value="0">N/A</option>
	            </select>
			</div>
		</div>

		<!-- Save/update -->
		<span class="pull-right">
			<button v-on:click="update($event, index)" class="btn btn-success">
				Save
			</button>
			<button v-on:click="cancel($event)" class="btn btn-warning">
				Cancel
			</button>
		</span>	
	</form>
</template>
<!-- End of Template -->
@stop