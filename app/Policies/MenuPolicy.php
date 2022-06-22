<?php

namespace App\Policies;

use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
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

    public function userMenu(User $user, Menu $menu)
    {
        return $user->id === $menu->restaurant->user_id || $user->role == 'master';
    }
}
