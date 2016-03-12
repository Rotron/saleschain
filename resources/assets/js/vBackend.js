new Vue({
	el: 'body',

	data: {
		users: []
	},

	ready: function() {
		this.getUsers();
	},
	
	methods: {
		getUsers: function(){
			$.get('/backend/getUsers', function(response){
				if (response != 0){
					this.users = response;
				}
			}.bind(this));	
		}
	} 
});

