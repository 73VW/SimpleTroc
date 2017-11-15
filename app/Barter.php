<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barter extends Model
{
    /**
     * A product can appear into many barter.
     * @return products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
