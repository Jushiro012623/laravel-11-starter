<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Order creation
            ["name" => "order:create", "label" => "Create order"], //1

            // General access to all orders (admin/employee)
            ["name" => "order:read", "label" => "Read any order"], //2
            ["name" => "order:update", "label" => "Update any order"], //3
            ["name" => "order:delete", "label" => "Delete any order"], //4
            ["name" => "order:cancel", "label" => "Cancel any order"], //5

            // Access to own orders (normal users)
            ["name" => "order:read:own", "label" => "Read own order"], //6
            ["name" => "order:update:own", "label" => "Update own order"], //7
            ["name" => "order:cancel:own", "label" => "Cancel own order"], //8

            // Order processing (for employees)
            ["name" => "order:assign", "label" => "Assign order to employee"], //9
            ["name" => "order:process", "label" => "Mark order as processed"],//10
            ["name" => "order:ship", "label" => "Mark order as shipped"],//11

            // Admin specific
            ["name" => "order:force-cancel", "label" => "Force cancel any order"],//12
            ["name" => "order:restore", "label" => "Restore deleted order"],//13
        ];

        foreach($permissions as $permission){
            Permission::factory()->create($permission);
        }

        
    }
}
