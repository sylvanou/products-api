<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {    
    $products = ['Graphic Shirt', 'Designer Jeans', 'Baseball Cap', 'Sundress'];
    $sizes = ['small', 'medium', 'large', 'x-large'];
    return [
        'name' => $products[$faker->numberBetween($min = 0, $max = sizeof($products) - 1)],
        'size' => $sizes[$faker->numberBetween($min = 0, $max = sizeof($sizes) - 1)],
        'color' => $faker->safeColorName,
        'brand' => $faker->company
    ];
});
