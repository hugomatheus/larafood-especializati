<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class ModulePlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planFree = Plan::find(1);
        $planEconomic = Plan::find(2);
        $planEssential = Plan::find(3);
        $planEnterprise = Plan::find(4);
        $planFullPass = Plan::find(5);


        $planFree->modules()->attach([1]);
        $planEconomic->modules()->attach([1,2]);
        $planEssential->modules()->attach([1,2,3]);
        $planEnterprise->modules()->attach([1,2,3,4]);
        $planFullPass->modules()->attach([1,2,3,4,5,6]);
    }
}
