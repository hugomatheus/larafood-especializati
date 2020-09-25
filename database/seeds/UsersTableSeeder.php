<?php

use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        $roleAdmin = Role::first();

        $userSuperAdmin = $tenant->users()->create([
            'name' => 'Administrador',
            'email' => "admin@admin.com",
            'password' => bcrypt('123456')
        ]);
        $userSuperAdmin->roles()->attach($roleAdmin);

        $tenant = Tenant::find(2);
        $user = $tenant->users()->create([
            'name' => 'Hugo Matheus Targino de Azevedo',
            'email' => "hugo_targino@outlook.com",
            'password' => bcrypt('123456')
        ]);

        $user->roles()->attach($roleAdmin);
    }
}
