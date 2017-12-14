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
        return count($this->comments()->where('isRead', false)->get());
    }
}
