<?php

namespace App;

/**
 * Category model.
 */
class Category extends Model
{
    /**
     * Any Categories may have many products.
     * @return an array of products object
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
