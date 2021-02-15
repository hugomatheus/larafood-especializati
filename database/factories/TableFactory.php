<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Table;
use App\Models\Tenant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Table::class, function (Faker $faker) {
    return [
        'tenant_id' => factory(Tenant::class),
        'identify' => Str::random(5).uniqid(),
        'description' => $faker->sentence,
    ];
});
