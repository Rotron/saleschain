<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{	
	protected $fillable = ['user_id', 'item_id', 'qty', 'purchase_id'];
	protected $table = 'orders';

	/**
	 * DB - Relationship
	 * @return each order belongs to one item
	 */
    public function item()
    {
    	return $this->belongsTo("App\Item");
    }
}
