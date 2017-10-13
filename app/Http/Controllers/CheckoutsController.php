<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;


class CheckoutsController extends Controller
{
	/**
	 * Show a form that the user have to put is credit cart
	 * @return view.blade.php
	 */
    public function index()
    {
    	return view('checkouts.index');
    }

    /**
     * [charge description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function charge(Request $request)
    {
	    $stripe = Stripe::make(env('STRIPE_SECRET'));

		$charge = $stripe->charges()->create([
		    'currency' => 'USD',
		    'source' => $request->stripeToken,
		    'amount'   => 50.49,
		]);

		echo $charge['id'];
    }
}
