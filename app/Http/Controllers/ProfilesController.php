<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    public function update(Request $request)
    {
    	# TODO : faire l'update + refaire la redirection
    }

    /**
     * delete the current user
     * @return [type] [description]
     */
    public function delete()
    {
    	# TODO : faire la suppression + la redirection
    }
}
