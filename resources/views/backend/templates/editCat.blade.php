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
			<button v-on:click="save($event, index)" class="btn btn-success">
				Save
			</button>
			<button v-on:click="cancel($event)" class="btn btn-warning">
				Cancel
			</button>
		</span>	
	</form>
</template>