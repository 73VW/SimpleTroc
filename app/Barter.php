<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barter extends Model
{
	/**
	 * A product can appear into many barter
	 * @return [type] [description]
	 */
    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
