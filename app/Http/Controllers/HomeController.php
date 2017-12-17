<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $products = \App\Product::where('user_id', '<>', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(6);
        } else {
            $products = \App\Product::paginate(6);
        }
        // if ($request->ajax()) {
        //     return view('home.index', compact('products'));
        // }

        return view('home.index', compact('products'));
    }
}
