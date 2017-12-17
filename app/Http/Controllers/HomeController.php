<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('search');

        if (Auth::check()) {
            $products = \App\Product::where('user_id', '<>', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(6);
        } else {
            $products = \App\Product::orderBy('created_at', 'desc')->paginate(6);
        }
        if (isset($name)) {
            $products = \App\Product::orderBy('created_at', 'desc')->where('name', 'like', "%$name%")->paginate(6);
        }

        return view('home.index', compact('products'));
    }
}
