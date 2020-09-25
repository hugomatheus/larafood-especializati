<?php

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([

            [
                'name' => 'add_users',
                'description' => 'Adicionar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'edit_users',
                'description' => 'Editar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'show_users',
                'description' => 'Visualizar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'delete_users',
                'description' => 'Deletar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'index_users',
                'description' => 'Listar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'add_categories',
                'description' => 'Adicionar categorias',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'edit_categories',
                'description' => 'Editar categorias',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'show_categories',
                'description' => 'Visualizar categorias',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'delete_categories',
                'description' => 'Deletar categorias',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'index_categories',
                'description' => 'Listar categorias',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'add_products',
                'description' => 'Adicionar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'edit_products',
                'description' => 'Editar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'show_products',
                'description' => 'Visualizar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'delete_products',
                'description' => 'Deletar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'index_products',
                'description' => 'Listar usuários',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'add_tables',
                'description' => 'Adicionar categorias',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'edit_tables',
                'description' => 'Editar mesas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'show_tables',
                'description' => 'Visualizar mesas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'delete_tables',
                'description' => 'Deletar mesas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'index_tables',
                'description' => 'Listar mesas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


        ]);
    }
}
