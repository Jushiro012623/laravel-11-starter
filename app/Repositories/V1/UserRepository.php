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
    public function getUserByEmail(string $email): User {
        return User::where("email", $email)->first();
    }

    public function updateUserPassword(string $password, User $user): void {
        $user->password = Hash::make($password);
        $user->save();
    }
    
}
