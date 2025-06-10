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
    

    public function updateStatus(User $user): bool {      

        if($user->hasRole("super_admin|admin")){
            return true;
        }

        return $user->hasRole('employee') && $user->role->hasPermission("order:assign");
    }

    public function show(User $user, Order $order) {

        if($user->hasRole("admin|super_admin")){
            return true;
        }

        if($user->hasRole('employee')){
            return $order->deliveredBy?->id === $user->id;
        }

        return $user->id === $order->user_id && $user->role->hasPermission("order:read:own");
    }
    
    
}
