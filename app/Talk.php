<?php

namespace App;

class Talk extends Model
{
    /**
     * A talk can have many users (our case max. 2).
     * @return [type] [description]
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * A talk can have many comments.
     * @return [type] [description]
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function barter()
    {
        return $this->belongsTo(Barter::class);
    }

    /**
     * get the other user in the conversation.
     * @return [type] [description]
     */
    public function otherUser()
    {
        $user = $this->users()->where('user_id', '!=', auth()->user()->id)->first();

        return $user;
    }

    public function lastComment()
    {
        return $this->comments()->latest()->first();
    }

    public function AmITheUserLeft()
    {
        return $this->barter()->where('user_id', auth()->user()->id)->first();
    }

    public function isOver()
    {
        return $this->isUserLeftClose && $this->isUserRightClose;
    }

    public function hasOneOver()
    {
        return $this->AmITheUserLeft() && $this->isUserLeftClose || ! $this->AmITheUserLeft() && $this->isUserRightClose;
    }

    public function getNoReadComment()
    {
        $me = auth()->user()->id;

        return count($this->comments()->where('isRead', false)->where('user_id', '!=', $me)->get());
    }
}
