<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'abdallah hamada',
            'email'=>'admin@gmail.com',
            'password'=>'admin@admin',
        ]);
        Permission::create(['show invoices']);
        Permission::create(['edit invoices']);
        Permission::create(['delete invoices']);
        Permission::create(['show sections']);
        Permission::create(['edit sections']);
        Permission::create(['delete sections']);
        Permission::create(['show products']);
        Permission::create(['edit products']);
        Permission::create(['delete products']);
        Permission::create(['show users']);
        Permission::create(['edit users']);
        Permission::create(['delete users']);
        Permission::create(['show permissions']);
        Permission::create(['edit permissions']);
        Permission::create(['add permissions']);
        Permission::create(['delete permissions']);
        $permissions=Permission::all()->toArray();
        $user->givePermissionTo($permissions);
    }
}
