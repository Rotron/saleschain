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
		<edituser :user="current" :index="index"></edituser>	
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
</div>
<hr>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						<h4 class="clickable"><span class="glyphicon glyphicon-user"></span>&nbsp;
							<span v-on:click="sortBy('name')">User</span>
							<span v-show="sortKey == 'name' ">
								<span  class="glyphicon" 
									v-bind:class="[(orderKey == 1) ? 
												'glyphicon-sort-by-alphabet' : 
												'glyphicon-sort-by-alphabet-alt']">
								</span> 
							</span>
						</h4>
					</th>
					<th><h4><span class="glyphicon glyphicon-envelope"></span>&nbsp; Email</h4></th>
					<th>
						<h4 class="clickable"><span class="glyphicon glyphicon-list"></span> &nbsp;
							<span v-on:click="sortBy('subscription')">Subscription</span>
							<span v-show="sortKey == 'subscription' ">
								<span  class="glyphicon" 
										v-bind:class="[(orderKey == 1) ? 
													'glyphicon-sort-by-alphabet' : 
													'glyphicon-sort-by-alphabet-alt']">
								</span> 
							</span>
						</h4>
					</th>
					<th>
						<h4 class="clickable"><span class="glyphicon glyphicon-check"></span> &nbsp;
							<span v-on:click="sortBy('approved')">Approval</span>
							<span v-show="sortKey == 'approved' ">
								<span  class="glyphicon" 
									v-bind:class="[(orderKey == 1) ? 
												'glyphicon-sort-by-alphabet' : 
												'glyphicon-sort-by-alphabet-alt']">
								</span> 
							</span>
						</h4>
					</th>
					<th><h4><span class="glyphicon glyphicon-wrench"></span> &nbsp;Options</h4></th>
				</tr>
			</thead>
			<tbody>
			
				<tr v-for = "(index, user) in users | filterBy search in 'name'
													| orderBy sortKey orderKey" >
		    		<td> @{{ user.name }} </td>
		        	<td> @{{ user.email }} </td>
		        	<td> @{{ user.subscription }} </td>
		        	<td> 
		        		<span v-if="user.approved == 1"> Yes </span> 
		        		<span v-else> No </span> 					
		        	<td>
		            	<button class="btn btn-xs btn-info glyphicon glyphicon-pencil"
		            		v-on:click="editUser(user)">
		            	</button> 
		            	&nbsp;&nbsp;
		            	<button class="btn btn-xs btn-danger glyphicon glyphicon-trash"
		            		v-on:click="deleteUser(user)">
		            	</button>
		            </td>		
				</tr>
			</tbody>
		</table>
	</div>
</div>

@include('backend.templates.editUser')

@section('scripts')
<script src="/js/backend/users.js"> </script>

@stop

@stop