<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'available', 'category_id', 'pic', 'qty'];
    protected $table = 'items';

    /**
     * DB - Relationship
     * @return an item belongs to one category
     */
    public function category()
    {
    	return $this->belongsTo("App\Category");
    }

    /**
     * DB - Relationship
     * @return an item can be ordered multiple times
     */
    public function orders()
    {
    	return $this->hasMany("App\Order");
    }
}
