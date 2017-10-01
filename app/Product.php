<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Product Model.
 */
class Product extends Model
{
    /**
     * An user belongs to an user.
     * @return an object user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Any Product may have many Carts.
     * @return an array of carts object
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
