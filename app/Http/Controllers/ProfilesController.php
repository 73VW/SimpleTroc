<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUser;

class ProfilesController extends Controller
{

	function __construct()
	{
		$this->middleware('auth'); # only user connected can access
	}

	/**
	 * Go to the home user
	 * @return view
	 */
    public function index()
    {
    	return view('profiles.index');
    }

    /**
     * Go to the edit user page
     * @return view
     */
    public function edit()
    {
    	return view('profiles.edit');
    }

    /**
     * update and save the data user
     * @param  User   $user
     * @return view
     */
    public function update(UpdateUser $request)
    {
        // get the array valided input
        $input = $request->validated(); //prevent for adding malicious input...

        // update the user
        Auth::user()->update($input);

        // return back
        return view('profiles.edit');
    }

    /**
     * delete the current user
     * @return [type] [description]
     */
    public function delete()
    {
    	# TODO : faire la suppression du compte + la redirection
    }
}
