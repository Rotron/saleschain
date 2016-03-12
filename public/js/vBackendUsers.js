/*----------------------------------------
| Vue editUser component
|----------------------------------------*/
var Child = Vue.component('edituser', {
	props: ['user', 'index'],
	
	template: '#edit-user',
	
	data: function () {
    	return { 
			subscriptions: ['Platinum', 'Gold', 'Silver', 'Bronze']
    	};
  	},
  	methods: {
		update: function (e, index) {
			e.preventDefault();
			this.$dispatch('updateUser', index);
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
		edituser: Child
	},

	data: {
		users: [],
		search: '',
		index: '',
		current: '',
		sortKey: 'approved',
		orderKey: 1,
	},

	events: {
		'updateUser': function(index) {
			$.post('/backend/updateUser', {user: this.current} , function(response){
				if (response != 0) {
					this.users.$set(index, this.current);
					this.current = '';
				}
			}.bind(this));
		},

		'cancel': function() {
			// this.index = '';
			this.current = '';
		}
	},

	ready: function() {
		this.getUsers();
	},
	
	methods: {

		getUsers: function() {
			$.get('/backend/getUsers', function(response) {
				if (response != 0) {
					this.users = response;
				}
			}.bind(this));	
		},

		sortBy: function(key){
			if (key == this.sortKey) {
				(this.orderKey == 1) ? this.orderKey = -1: this.orderKey = 1;
			} else {
				this.sortKey = key;
				this.orderKey = 1;
			}
		},
		
		editUser: function(index) {
			this.index = index;
			this.current = jQuery.extend({}, this.users[index]);
		},

		deleteUser: function(index) {
			var user = this.users[index];
			var that = this;
			notif_confirm({
				'textaccept': 'Yes',
				'textcancel': 'Cancel',
				'message': 'Delete user: '+ user.name +'?',
				'callback': function(choice){
					if (choice) that.confirmDeletion(user)
				}
		    });		
		},

		confirmDeletion: function(user) {
			var id = user.id;
			
			$.post('/backend/deleteUser', {id: id}, function(response) {
				
				if (response != 0) {
					this.users.$remove(user);
					notif({
						'type': 'success',
						'msg': 'User has been deleted',
						'timeout': 2200,
						'position': 'center'
					});

				} else {
					console.log("Error! user not deleted: " +response);
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



