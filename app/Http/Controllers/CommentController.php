<?php

namespace App\Http\Controllers;

use App\Talk;
use App\Http\Requests\CommentForm;

class CommentController extends Controller
{
    public function store(CommentForm $request)
    {
        auth()->user()->addComment($request->only('body', 'talk_id'));

        return redirect()->back();
    }

    /**
     * turn comment(s) to true from the current talk.
     * @param  Talk    $talk
     * @return bool
     */
    public function hasRead(Talk $talk)
    {
        $me = auth()->user()->id;
        $talk->comments()->where('user_id', '!=', $me)->update(['isRead' => true]);

        return 'all message read';
    }
}
