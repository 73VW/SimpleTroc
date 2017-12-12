<?php

namespace App;

/**
 * Product Model.
 */
class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Define guarded columns.
     *
     * @var array
     */
    protected $guarded = ['id'];

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
    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A product may have many pictures.
     * @return an array of pictures object
     */
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * A product can be in many barters.
     */
    public function barters()
    {
        return $this->belongsToMany(Barter::class);
    }

    /**
     * save picture.
     * @param  Picture
     * @return void
     */
    public function storeImage(Picture $picture)
    {
        $this->pictures()->save($picture);
    }
}
