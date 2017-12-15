<?php

namespace App\Http\Controllers;

use App\Talk;

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
        $comments = $talk->comments()->latest()->get();

        return view('talks.show', compact('comments', 'talk'));
    }

    public function closeTalk(Talk $talk)
    {
        $me = auth()->user()->id;
        if($talk->barter()->where('user_id', $me)->first())
        {
            $talk->isUserLeftClose = True;
        }else{
            $talk->isUserRightClose = True;

        }

        if($talk->isUserRightClose && $talk->isUserLeftClose){
            $talk->isClose=True;
        }

        $talk->save();

        return redirect()->back();
    }

    public function cancelTalk(Talk $talk)
    {
        //detach both user from the conversation
        $talk->users()->detach();
        //change the state of product to 0 (mean that the product is now available for the market)
        $barter = $talk->barter()->first();
        $barter->products()->update(['state' => 0]);

        $talk->delete();
        $barter->delete();

        session()->flash('message', 'You cancel the transaction');

        return redirect('/profile');
    }
}
