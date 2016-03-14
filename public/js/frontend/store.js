(function () {
  $("li.active").removeClass('active');
  $("li.Store").addClass('active');
})();
new Vue({
	el: 'body',

	data: {
		cats: [],
		search: '',
		items: [],
		category: 0,
		cart:[],
		current: '',
		viewCart: false,
		sortKey: 'price',
		orderKey: 1,
	},

	ready: function(){
		this.getCats();
	},
	
	computed: {
		ttl: function() {
			var result = 0;
			this.cart.forEach(function(o) {
				result += o.price * o.qty;
			});
			return result;
		}
	},

	methods: {
		getCats: function() {

			$.get('/backend/categories/getCats', function(response) {
				if (response != 0) {
					this.cats = response;
				}
			}.bind(this));	
		},

		goGetEm: function() {
			var obj = {name: this.search, cat: this.category};
			$.post('/backend/items/search', obj, function(response){
				this.items = response;
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

		addItem: function(item) {
			var result = $.grep(this.items, function(e){ return e.id == item.id; });
			this.current = jQuery.extend({}, result[0]);
			var order    = this.orderExists();
			
			if (order != -1) {
				if (order.qty < this.current.qty) {
					order.qty += 1;
				} else {
					notif({
						type: 'error',
						msg: 'Sorry! Item is out of stock :(',
						position: 'center',
						autohide: false
					});					
				}
			} else {
				this.current.qty = 1;
				this.cart.push(this.current);
			}
			this.current = '';
		},

		orderExists: function() {
		    for (i = 0; i < this.cart.length; i++) {
		        if (this.cart[i].id === this.current.id) {
		            return this.cart[i];
		        }
		    }
		    return -1;
		},

		purchase: function() {
			$.post('/purchase', {cart: this.cart}, function(response){
				if (response != 0) {
					notif({
						type: 'success',
						msg: 'Your order has been sent',
						position: 'center'
					});

					this.viewCart = false;
					this.cart     = [];
				}
			}.bind(this));
		},

		removeOrder: function(order){
			this.cart.$remove(order);
			(this.cart.length > 0) ? '' : this.viewCart = false;
		}
	} 
});