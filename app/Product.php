<?php

namespace App;

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

    /**
     * Any product may have many categories.
     * @return an array of categories object
     */
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
