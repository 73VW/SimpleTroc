<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Model extends from Eloquent\Model for mass assignable attributes.
 */
class Model extends Eloquent
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];
}
