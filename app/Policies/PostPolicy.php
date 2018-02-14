<?php

namespace App\Policies;

use App\User;
use App\Post;
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

    public function update(User $user, Post $post)
    {
    	if ($user->isGuest())
    	{
			return false;
		}
        return $user->id === $post->user_id;
    }

	public function before($user, $ability)
	{
		return $user->isAdmin() ? true : null ;
	}
}
