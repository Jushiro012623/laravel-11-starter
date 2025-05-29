<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user) {
        return $user->role->hasPermission("order:create");
    }
    

    public function assign(User $user): bool {

        if($user->hasRole("super_admin|admin")){
            return true;
        }

        return $user->hasRole('employee') && $user->role->hasPermission("order:assign");
    }
}
