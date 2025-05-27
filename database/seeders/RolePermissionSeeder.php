<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['1', '6', '7','8'];
        foreach($permissions as $permission){
            RolePermission::create([
                'role_id' => 1,
                'permission_id' => $permission
            ]);
        }

        $permissions = ['1', '2', '3','4','5','9','10', "11"];
        foreach($permissions as $permission){
            RolePermission::create([
                'role_id' => 4,
                'permission_id' => $permission
            ]);
        }

        $permissions = ['1', '2', '3','4','5','9','10', "11",'12', "13"];
        foreach($permissions as $permission){
            RolePermission::create([
                'role_id' => 2,
                'permission_id' => $permission
            ]);
        }
    }
}
