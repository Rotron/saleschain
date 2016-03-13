<template id="edit-user">
	<form class="form-horizontal">
		<!-- Name -->
		<div class="form-group">		
			<label class="col-sm-2 control-label" for="name">Name</label>
			<div class="col-sm-10">
				
				<input v-model="user.name" value="@{{ user.name }}"
					type="text" id='name' class="form-control" >
			</div>
		</div>
		<!-- Subscription -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="subscription">Subscription</label>
			
			<div class="col-sm-10">
				
				<select v-model="user.subscription"
					class="form-control" id="subscription" name="subscription">
					
					<option v-for="subscription in subscriptions">
						@{{ subscription }}
					</option>
				</select>
			</div>
		</div>
		<!-- Approval -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="approval">Approval</label>
			
			<div class="col-sm-10">
				
				<select v-model="user.approved"
					class="form-control" id="approval" name="approval">
	                <span v-if="user.approved === 1">
	                	<option value="1">Yes</option>
	                	<option value="0" selected>No</option>
	                </span>
					<span v-else>
						<option value="1">Yes</option>
	                	<option value="0" selected>No</option>
					</span>
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