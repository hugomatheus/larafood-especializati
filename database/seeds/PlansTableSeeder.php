<?php

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::insert([
            [
                'name' => 'Free',
                'url' => 'free',
                'price' => 0,
                'description' => 'Completely free plan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Economic',
                'url' => 'economic',
                'price' => 20.90,
                'description' => 'Economic plan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Essential',
                'url' => 'essential',
                'price' => 50,
                'description' => 'Essential plan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Enterprise',
                'url' => 'enterprise',
                'price' => 100,
                'description' => 'Enterprise plan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Full pass',
                'url' => 'full-pass',
                'price' => 200.98,
                'description' => 'Full pass plan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
