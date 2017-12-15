<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = \App\Product::where('user_id', '<>', auth()->user()->id)
                                ->where('state', 0)
                                ->orderBy('created_at', 'desc')->paginate(6);

        // if ($request->ajax()) {
        //     return view('home.index', compact('products'));
        // }

        return view('home.index', compact('products'));
    }
}
