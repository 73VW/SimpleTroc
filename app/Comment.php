<?php

namespace App;

class Comment extends Model
{
    /**
     * Comment belong to an specific user.
     * @return a User instance
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Comment belong to a talk.
     * @return a talk instance
     */
    public function talk()
    {
        return $this->belongsTo(Talk::class);
    }

    public function isCurrentUser()
    {
        return $this->user()->first() == auth()->user();
    }

    public function getUserName()
    {
        $u = $this->user()->first();

        return $u->name;
    }
}
