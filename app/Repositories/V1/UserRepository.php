<?php

namespace App\Repositories\V1;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
         * Retrieve a user by their email address.
         *
         * @param string $email
         * @return User|null
    */
    public function getUserByEmail(string $email): User {
        return User::where("email", $email)->first();
    }

    /**
         * Update the password for the given user.
         *
         * @param string $password
         * @param User $user
         * @return void
    */
    public function updateUserPassword(string $password, User $user): void {
        $user->password = Hash::make($password);
        $user->save();
    }
    
    
    public function getUserActiveAddress(User $user) {
        return $user->address->where("status", 1)->first();
    }
    
}
