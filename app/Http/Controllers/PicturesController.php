<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureForm;
use App\Picture;
use App\Product;
use Storage;

class PicturesController extends Controller
{
	/**
     * Only user with access can have a profile.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*
    * Destroy the pictures who is associate to the products in the local driver.
    */
	public function destroy(Picture $picture)
	{

        /*
        * delete the picture from the local storage and the DDB
        */
       Storage::delete('public/'.$picture->path);
       $picture->delete();

        /*
        * confirm the succes to the user
        */
        session()->flash('message', 'Delete picture success !');

       return redirect()->back();
	}

    /**
     * Store the picture to the associate product
     * @param  Product     $product
     * @param  PictureForm $request
     * @return back to the previous page
     */
    public function store(PictureForm $request, Product $product)
    {
        $paths = [];

        // check if any files images has been sended
        if ($request->hasFile('image')) {

            // store the image in local and save the path
            $files = $request->allFiles('image')['image'];

            // store the files in the local drive
            foreach ($files as $file) {
                array_push($paths, $file->store('public/img/products'));
            }
        }

        if ($paths) {
            //store the images associate to the current product
            for ($i = 0; $i < count($paths); $i++) {
                $product->storeImage(new Picture(['path' => substr($paths[$i], 7)]));
            }
        }

        return redirect()->back();
    }
}
