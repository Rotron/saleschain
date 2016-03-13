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