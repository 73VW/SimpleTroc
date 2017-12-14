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

    public function getUserProductTroc()
    {
        $userProduct = $this->products()->where('user_id', $this->user_id)->first();

        return $userProduct->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserTroc()
    {
        //$user = \App\User::where('id', $this->b_user_id)->first();
        $user = \App\User::where('id', $this->user_id)->first();

        return $user;
    }
}
