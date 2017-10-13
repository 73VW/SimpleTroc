<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductForm;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Only user with access can have a profile.
     */
	function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * View that show the all products that the user want to sell.
	 * @return view with array of products
	 */
    public function index()
    {
    	$products = auth()->user()->products();
    	return view('products.index', compact('products'));
    }

    /**
     * Create a new product.
     * @return view
     */
    public function create()
    {
    	return view('products.create');
    }

    /**
     * Store the products in the database
     * @param  Request $request
     * @return view
     */
    public function store(ProductForm $request)
    {
    	//store the image in local and save the path
    	$path = $request->file('image')->store('public/images-products');
    	//unset($request['image']);


    	//save the products
    	auth()->user()->storeProduct(
    		new Product(request(['name', 'price', 'description', 'isNegotiable'])),
    		$path
    	);
    }
}
