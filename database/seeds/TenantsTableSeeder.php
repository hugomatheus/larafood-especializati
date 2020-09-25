<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::orderBy('id', 'desc')->first();
        $plan->tenants()->create([
            'cnpj' => '00677219000120',
            'name' => 'Larafood',
            'url' => 'larafood',
            'email' => 'admin@admin.com',
        ]);

        $plan->tenants()->create([
            'cnpj' => '00677219000121',
            'name' => 'Lanche da moni',
            'url' => 'lanche-da-moni',
            'email' => 'hugo_targino@outlook.com',
        ]);
    }
}
