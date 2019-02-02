<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // factory(App\Product::class, 20)->create();
        $products = ['Graphic Shirt', 'Designer Jeans', 'Baseball Cap', 'Sundress'];
        $sizes = ['small', 'medium', 'large', 'x-large'];
        $colors = ['red', 'green', 'blue', 'yellow'];
        foreach ($products as $product) {
            foreach ($sizes as $size) {
                foreach ($colors as $key => $value) {
                    DB::table('products')->insert([
                        'name' => $products[$key],
                        'size' => $sizes[$key],
                        'color' => $colors[$key],
                        'brand' => $faker->company
                    ]);
                }
            }
        }
    }
}
