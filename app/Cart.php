<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Cart model
 */
class Cart extends Model
{
	/**
	 * A cart belong to an user
	 * @return an user object
	 */
    public function user(){
    	return $this->belongsTo(User::class);
    }

    /**
     * Any cart may have many product
     * @return an array of products object
     */
    public function products(){
    	return $this->belongsToMany(Product::class);
    }
}
