<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(self::class);
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

    public function getNoReadComment()
    {
        $me = auth()->user()->id;

        return count($this->comments()->where('isRead', false)->where('user_id', '!=', $me)->get());
    }
}
