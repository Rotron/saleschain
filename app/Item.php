<?php

namespace App;

use Auth;
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

    /**
     * Accessor
     * @param  Double $price 
     * @return Price * by user's percentage
     */
    public function getPriceAttribute($price)
    {
        if (Auth::user()->isAdmin === 1) {
            return number_format($price);
        }
        
        $subscriptions = \DB::table('subscriptions')->lists('interest', 'name');
       
        switch (Auth::user()->subscription) {
            case 'Platinum':
                $interest = 1 + $subscriptions['Platinum']/100;
                return number_format($price * $interest);
                break;

            case 'Gold':
                $interest = 1 + $subscriptions['Gold']/100;
                return number_format($price * $interest);
                break;

            case 'Gold':
                $interest = 1 + $subscriptions['Silver']/100;
                return number_format($price * $interest);
                break;
                
            default: 
                $interest = 1 + $subscriptions['Bronze']/100;
                return number_format($price * $interest);
                break;
        }
    }
}
