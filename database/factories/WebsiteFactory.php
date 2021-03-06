<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Website::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\App\Models\User::class)->create()->id;
        },
        'name' => ucfirst($faker->domainWord),
        'domain' => $faker->domainName
    ];
});
