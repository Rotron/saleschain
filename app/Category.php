<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'pic', 'available'];

    protected $table = 'categories';

    /**
     * DB - Relationship
     * @return a category can have many items
     */
    public function items()
    {
    	return $this->hasMany('App\Item');
    }
}
