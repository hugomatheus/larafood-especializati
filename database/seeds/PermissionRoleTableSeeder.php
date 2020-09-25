<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::first();
        $permissions = Permission::all();

        $roleAdmin->permissions()->attach($permissions);

    }
}
