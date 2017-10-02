<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Picture model.
 */
class Picture extends Model
{
    /**
     * A picture belongs to a product.
     * @return a product object
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
