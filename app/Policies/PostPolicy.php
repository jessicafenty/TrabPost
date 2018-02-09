<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before($user, $ability){
        if($user->type == User::_TYPEADMIN){
            return true;
        }
    }
    public function edit(User $user, Post $post){
        return $user->id === $post->user->id;
    }
    public function destroy(User $user, Post $post){
        return $user->id === $post->user->id;
    }

}

