/*----------------------------------------
| Vue editCat component
|----------------------------------------*/
var Child = Vue.component('editcat', {
	props: ['cat', 'index'],
	
	template: '#edit-cat',

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
			console.log("calling cats");
			$.get('/backend/categories/getCats', function(response) {
				if (response != 0) {
					this.cats = response;
				}
			}.bind(this));	
		},

		create: function(index){
			$.post('/backend/categories/create', {cat: this.current}, function(response){
				if (response.success == 200) {	
					this.current.id = response.id;
					this.cats.push(this.current);
					this.current = '';
				}
			}.bind(this));
		},

		update: function(index){
			$.post('/backend/categories/update', {cat: this.current}, function(response){
				if (response != 0) {
					this.cats.$set(index, this.current);					
					this.current = '';
				}
			}.bind(this));	
		},

		editCat: function(index) {
			this.index = index;
			this.current = jQuery.extend({}, this.cats[index]);
		},

		deleteCat: function(index) {
			var cat  = this.cats[index];
			var that = this;
			
			notif_confirm({
				'textaccept': 'Yes',
				'textcancel': 'Cancel',
				'message': 'Delete '+ cat.name +' and all associated items?',
				'callback': function(choice){
					if (choice) that.confirmDeletion(cat)
				}
		    });		
		},

		confirmDeletion: function(cat) {
			var id = cat.id;
			
			$.post('/backend/categories/delete', {id: id}, function(response) {
				
				if (response != 0) {
					this.cats.$remove(cat);
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



