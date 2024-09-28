<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Audrius Ivko',
            'email' => 'audrius@gmail.com',
            'password' => bcrypt('123')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'First User',
            'email' => 'audrius@ivko.org',
            'password' => bcrypt('123')
        ]);

        $role = Role::create(['name' => 'User']);
        $permissions = Permission::where('name', 'LIKE', 'product-%')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);


        $user = User::create([
            'name' => 'Second User',
            'email' => 'helpdesk@ivko.org',
            'password' => bcrypt('123')
        ]);

        $permissions = Permission::where('name', 'LIKE', 'product-%')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([2]);
    }
}