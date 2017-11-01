<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$products = \App\Product::all();

        return view('home.index', compact('products'));
    }
}
