<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $products = \App\Product::all();

        return view('home.index', compact('products'));
    }
}
