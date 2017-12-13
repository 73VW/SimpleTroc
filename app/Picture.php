<?php

namespace App;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;

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

        return $adapter->getTemporaryLink('public/'.$this->path);
    }
}
