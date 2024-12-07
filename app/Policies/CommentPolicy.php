<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function action(?User $user, Comment $comment){
        if($user->role){
            return true;
        }
        return $user->id === $comment->user_id;
    }
}
// authorization
