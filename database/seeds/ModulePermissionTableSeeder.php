<?php

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModulePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Modules
        $moduleUser = Module::find(1);
        $moduleCategory = Module::find(2);
        $moduleProduct = Module::find(3);
        $moduleTable = Module::find(4);
        $moduleFinancial = Module::find(5);
        $moduleApp = Module::find(6);

        // Permissions
        $permissionsUsers = [1,2,3,4,5];
        $permissionsCategories = [6,7,8,9,10];
        $permissionsProducts = [11,12,13,14,15];
        $permissionsTables = [16,17,18,19,20];


        $moduleUser->permissions()->attach($permissionsUsers);
        $moduleCategory->permissions()->attach($permissionsCategories);
        $moduleProduct->permissions()->attach($permissionsProducts);
        $moduleTable->permissions()->attach($permissionsTables);
        // $moduleFinancial->modules()->attach([]);
        // $moduleApp->modules()->attach([]);
    }
}
