<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PlansTableSeeder::class,
            TenantsTableSeeder::class,
            UsersTableSeeder::class,
            ModulesTableSeeder::class,
            PermissionsTableSeeder::class,
            ModulePlanTableSeeder::class,
            ModulePermissionTableSeeder::class
        ]);
    }
}
