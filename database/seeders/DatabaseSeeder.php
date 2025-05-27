<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
            RolePermissionSeeder::class,
        ]);
        $users = [
            [
                'username' => 'test.user',
                'email' => 'test@example.com',
            ],
            [
                'username' => 'admin.user',
                'email' => 'admin@example.com',
                'role_id' => 2,
            ],
            [
                'username' => 'emp.user',
                'email' => 'emp@example.com',
                'role_id' => 4,
            ]

        ];
        foreach($users as $user){
            User::factory()->create($user);
        }

        UserInfo::create([
            'first_name' => "IVAN ALLEN",
            'last_name' => "MARTIN",
            'mobile' => "09125279754",
            'user_id' => 1,
            'avatar' => "IVAN ALLEN",
        ]);

        Address::factory()->create([
            "country" => "PH",
            "city" => "MANILA",
            "province" => "METRO-MANILA",
            "region" => "NCR",
            "barangay" => "143",
            "detail" => "262 Ilaw St.",
            "user_id" => 1,
        ]);
    }
}
