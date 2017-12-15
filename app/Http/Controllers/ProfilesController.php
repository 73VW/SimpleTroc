<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;

class ProfilesController extends Controller
{
    /**
     * Only user with access can have a profile.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Go to the home user.
     * @return view
     */
    public function index()
    {
        $productHasBarters = \App\Product::with(array('barters' => function($query){
                    $query->where('user_id', '!=', auth()->user()->id);
                    $query->where('isRefuse', False);
                }))
                ->has('barters', '>', 0)
                ->where('user_id', auth()->user()->id)
                ->where('state', 0)
                ->get();

        $barters = auth()->user()->barters()->get();
        $talks = auth()->user()->talks()
                                ->where('isClose', False)
                                ->get();
        //dd($talks);

        return view('profiles.index', compact('productHasBarters', 'barters', 'talks'));
    }

    /**
     * Go to the edit user page.
     * @return view
     */
    public function edit()
    {
        return view('profiles.edit');
    }

    /**
     * update and save the data user.
     * @param  User   $user
     * @return view
     */
    public function update(UpdateUser $request)
    {
        // get the array valided input
        $input = $request->validated(); //prevent for adding malicious input...

        // update the user
        auth()->user()->update($input);

        // confirm the succes to the user
        session()->flash('message', ' Profile update with success !');

        // return to the profile
        return view('profiles.index');
    }

    /**
     * delete the current user.
     * @return [type] [description]
     */
    public function delete()
    {
        // TODO : faire la suppression du compte + la redirection
    }
}
