<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentForm;

class CommentController extends Controller
{
    public function store(CommentForm $request)
    {
    	auth()->user()->addComment($request->only('body', 'talk_id'));
    	return redirect()->back();
    }
}
