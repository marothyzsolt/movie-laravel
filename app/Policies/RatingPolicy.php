<?php

namespace App\Policies;

use App\Rating;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * @param User $user
     * @param Rating $rating
     * @return bool
     */
    public function delete(User $user, Rating $rating): bool
    {
        return $user->id === $rating->user_id;
        //return (int)$user->id === (int)$rating->user_id;
    }
}
