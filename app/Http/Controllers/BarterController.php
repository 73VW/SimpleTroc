<?php

namespace App\Http\Controllers;

use App\Talk;
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
     * Get all products where they have a relation with.
     * @return [type] [description]
     */
    public function index()
    {
        $barters = \App\Product::with('barters')->has('barters', '>', 0)->get();

        return $barters;
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

        $products = auth()->user()->products()->where('state', 0)->get();

        return view('barter.index', compact('products', 'wanted'));
    }

    /**
     * Store the a new barter(=troc).
     * @param  Request $request
     * @return view
     */
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
            }
        }
        // store barter
        // attach product to barter
        $barter = auth()->user()->addBarter();

        $barter->products()->attach($request->my_product_id);
        $barter->products()->attach($request->product_id);

        // confirm the succes to the user
        session()->flash('message', ' Troc request created with success !');

        // redirect to the profile user product
        return redirect('/home');
    }

    public function refuseDeal(Barter $barter)
    {

        //step 1 : detach all product related with the barter from the pivot table
        //$barter->products()->detach();

        //step 2 : say to the user that is refuse the barter
        $barter->isRefuse = true;
        $barter->save();

        //step 3 : confirm the current user that he decline the barter
        session()->flash('message', ' Your decline his offer !');

        //step 4 return to the view
        return redirect('/profile');
    }

    public function closeDeal(Barter $barter)
    {
        //step 1 : Close the product
        $barter->products()->detach();
        $barter->isClose = true;
        $barter->save();

        //step 4 return to the view
        return redirect('/profile');
    }

    public function abortDeal(Barter $barter)
    {
        //step 1 : detach/delete all product related with the barter from the pivot table
        $barter->products()->detach();
        $barter->delete();

        //step 2 : confirm the current user that he decline the barter
        session()->flash('message', ' Your decline his offer !');

        //step 3 return to the view
        return redirect('/profile');
    }

    public function acceptDeal(Barter $barter)
    {
        //step 1 : create a talk between the two users
        $left = $barter->getUserProductTroc()->name;
        $right = $barter->getUserRightProductTroc()->name;

        $talk = Talk::create([
            'title' => $left.' againt '.$right,
            'barter_id' => $barter->id,
        ]);

    //    dd($left, $right);
    //    $talk->title = $left.' against '.$right;
    //    $talk->barter_id = $barter->id;
    //    $talk->save();

        //step 1.bis
        $barter->isClose = true;
        $barter->save();

        //step 2 :
        //-  attach to the pivot table
        //-  change the state of the products -> 1 means sells
        foreach ($barter->products()->get() as $product) {
            $product->state = 1;
            $product->save();
            $user = $product->user()->get();
            $talk->users()->attach($user);
        }

        //step 3 : closeTheDeal
        $this->closeDeal($barter);

        //step 3.bis : confirm the current user that he decline the barter
        session()->flash('message', ' Your close the barter !');

        //step 4 : go to the conversation
        return redirect('/talks/show/'.$talk->id);
    }
}
