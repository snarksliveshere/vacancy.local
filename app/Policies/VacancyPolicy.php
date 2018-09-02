<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacancyPolicy
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

    public function see(User $user)
    {
        if ((null !== $user->roles()->first()) && $user->roles()->first()->name === 'moderator') {
            return true;
        }
        return false;
    }


}
