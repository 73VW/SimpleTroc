<?php

namespace App;

use App\Picture;
use App\Product;
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
     * A user has many products
     * @return array of product object
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Save the product to the database
     * @param  Product $product
     */
    public function storeProduct(Product $product, $path)
    {

        //save the product user
        $this->products()->save($product);

        //store the image associate to the current product
        $product->storeImage(new Picture(['path' => $path]));
    }
}
