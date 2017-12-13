<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;

class TalkController extends Controller
{
	/**
     * Only user with access can have a profile.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Talk $talk)
    {
    	$comments = $talk->comments()->get();
    	return view('talks.show', compact('comments', 'talk'));
    }
}
