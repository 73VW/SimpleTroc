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

    public function barters()
    {
        return $this->hasMany(Barter::class);
    }

    /**
     * User can have many commnents.
     * @return a collection of Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * User can have many talks.
     * @return a collection of Talk
     */
    public function talks()
    {
        return $this->belongsToMany(Talk::class);
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

    /**
     * current user create new barter.
     */
    public function addBarter()
    {
        return $this->barters()->create();
    }

    public function addComment($request)
    {
        $this->comments()->create($request);
    }
}
