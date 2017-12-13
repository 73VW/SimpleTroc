<?php

namespace App\Http\Controllers;

use App\Barter;
use Illuminate\Http\Request;

class BarterController extends Controller
{
    /**
     * Only user with access can have a profile.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new barter.
     * @return view
     */
    public function create(Request $request)
    {
        if (! isset($request->product_id)) {
            return redirect('/home');
        }

        $wanted = \App\Product::where('id', '=', $request->product_id)->get()[0];

        $products = auth()->user()->products()->get();

        return view('barter.index', compact('products', 'wanted'));
    }

    public function store(Request $request)
    {
        if (! isset($request->product_id) || ! isset($request->my_product_id)) {
            return redirect('/home');
        }

        $wanted = \App\Product::where('id', '=', $request->my_product_id)->get()[0];
        $barters = $wanted->barters()->get();

        foreach ($barters as $barter) {
            $products = $barter->products()->get()->toArray();
            $func = function ($arr) {
                return $arr['id'];
            };
            $products = array_map($func, $products);
            if (in_array($request->my_product_id, $products) && in_array($request->product_id, $products)) {
                // confirm the succes to the user
                session()->flash('message', ' Troc request already exists !');

                return redirect('/home');
            } else {
                dump($request->my_product_id);
                dump($request->product_id);
                dd($products);
            }
        }
        // store barter
        // attach product to barter
        $barter = Barter::create();
        $barter->save();

        $barter->products()->attach($request->my_product_id);
        $barter->products()->attach($request->product_id);

        // confirm the succes to the user
        session()->flash('message', ' Troc request created with success !');

        // redirect to the profile user product
        return redirect('/home');
    }
}
