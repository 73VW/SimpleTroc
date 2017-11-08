<?php

namespace App;
use App\Product;

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

    /**
     * return a temporary link to the image.
     * @return string
     */
    public function link()
    {
        $adapter = \Storage::disk('dropbox')->getAdapter();
        $client = $adapter->getClient();

        return $client->getTemporaryLink('public/'.$this->path);
    }
}
