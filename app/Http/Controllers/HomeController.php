<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $products = \App\Product::where("user_id","<>",auth()->user()->id)->get();

        return view('home.index', compact('products'));
    }
}
