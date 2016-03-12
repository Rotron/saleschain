<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'subscription'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Scope
     * Returns users (NON-Admins by default)
     * @param  QueryBuilder  $query         
     * @param  option $isAdmin 0 or 1
     * @return App\User                 
     */
    public function scopeUsers($query, $isAdmin = 0){
        $query->where( 'isAdmin', '=', $isAdmin );
    }






}
