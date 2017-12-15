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

        return $userProduct;
    }

    public function getUserRightProductTroc()
    {
        $userProduct = $this->products()->where('user_id', '!=', $this->user_id)->first();
        return $userProduct;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function talk(){
        return $this->hasOne(Talk::class);
    }

    public function getUserTroc()
    {
        $user = \App\User::where('id', $this->user_id)->first();
        return $user;
    }

    public function getUserRightTroc()
    {
        $p = $this->products()->where('user_id','!=', $this->user_id)->first();
        return $p->user()->first();
    }

    /**
     * check if this barter is different from  own id ! if yes, this is a proposition
     * @return boolean
     */
    public function isProposition()
    {
        $u = $this->user()->first();
        return auth()->user()->id != $u->id;
    }
}
