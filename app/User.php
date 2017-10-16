<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user has many products.
     * @return array of product object
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Save the product to the database.
     * @param  Product $product
     */
    public function storeProduct(Product $product, $paths = null)
    {

        //save the product user
        $this->products()->save($product);

        if ($paths) {
            //store the images associate to the current product
            for ($i = 0; $i < count($paths); $i++) {
                $product->storeImage(new Picture(['path' => substr($paths[$i], 7)]));
            }
        }
    }
}
