<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\Tenant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'tenant_id' => factory(Tenant::class),
        'identify' => uniqid() . Str::random(10),
        'total' => 80.0,
        'status' => Order::STATUS['OPEN'],
    ];
});
