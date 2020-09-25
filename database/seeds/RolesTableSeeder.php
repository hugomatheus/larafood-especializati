<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'Admin',
                'description' => 'Admin do resturante no sistema'
            ],
            [
                'name' => 'Financeiro',
                'description' => 'Cargo financeiro'
            ],
        ]);
    }
}
