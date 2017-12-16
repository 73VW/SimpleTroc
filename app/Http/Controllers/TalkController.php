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
        if ($talk->barter()->where('user_id', $me)) {
            $talk->isLeftUserClose = true;
        } else {
            $talk->isRightUserClose = true;
        }
    }
}
