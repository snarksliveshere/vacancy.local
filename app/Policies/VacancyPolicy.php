<?php

namespace App\Policies;

use App\User;
use App\Vacancy;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

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

    public function checkUser(User $user, Vacancy $vacancy)
    {
//        dump($vacancy->user_id);
//
//        dump($user->id);
//        dd($user->id == $vacancy->user_id);
        return $user->id == $vacancy->user_id;
//        if($user->id == $vacancy->user_id) {
//            return true;
//        }
//        return false;
    }

    public function before(User $user)
    {
        if ((null !== $user->roles()->first()) && $user->roles()->first()->name === 'moderator') {
            return true;
        }
//        return false;
    }


}
