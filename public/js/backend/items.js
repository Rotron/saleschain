/*----------------------------------------
| Vue editItem component
|----------------------------------------*/
var Child = Vue.component('edititem', {
	props: ['item', 'index', 'cats'],
	
	template: '#edit-item',

  	methods: {
		save: function (e, index) {
			e.preventDefault();
			this.$dispatch('save', index);
		},
		cancel: function(e) {
			e.preventDefault();
			this.$dispatch('cancel');
		}
	}
});
/*----------------------------------------
| Vue - root
|----------------------------------------*/
new Vue({
	el: 'body',

	components: {
		editcat: Child
	},

	data: {
		cats: [],
		items: items,
		search: '',
		index: '',
		current: ''
	},

	events: {
		'save': function(index) {
			if (this.current.id > 0) {
				this.update(index);
			} else {
				this.create(index);
			}
		},

		'cancel': function() {
			// this.index = '';
			this.current = '';
		}
	},

	ready: function() {
		this.getCats();
	},
	
	methods: {
		getCats: function() {

			$.get('/backend/categories/getCats', function(response) {
				if (response != 0) {
					this.cats = response;
				}
			}.bind(this));	
		},

		create: function(index){
			$.post('/backend/items/create', {item: this.current}, function(response){
				if (response.success == 200) {	
					this.current.id = response.id;
					this.items.push(this.current);
					this.current = '';
				}
			}.bind(this));
		},

		update: function(index){
			$.post('/backend/items/update', {item: this.current}, function(response){
				if (response != 0) {
					this.items.$set(index, this.current);					
					this.current = '';
				}
			}.bind(this));	
		},

		editItem: function(index) {
			this.index = index;
			this.current = jQuery.extend({}, this.items[index]);
		},

		deleteItem: function(index) {
			var item  = this.cats[index];
			var that = this;
			
			notif_confirm({
				'textaccept': 'Yes',
				'textcancel': 'Cancel',
				'message': 'Delete '+ item.name +' and all associated items?',
				'callback': function(choice){
					if (choice) that.confirmDeletion(item)
				}
		    });		
		},

		confirmDeletion: function(item) {
			var id = item.id;
			
			$.post('/backend/items/delete', {id: id}, function(response) {
				
				if (response != 0) {
					this.cats.$remove(item);
					notif({
						'type': 'success',
						'msg': 'Category and its associated items have been deleted',
						'timeout': 2200,
						'position': 'center'
					});

				} else {
					console.log("Error! category not deleted: " +response);
					notif({
						'type': 'error',
						'timeout': 2700,
						'msg': 'Something went wrong!',
						'position': 'center'
					});
				}
			}.bind(this));
		}
	} 
});



