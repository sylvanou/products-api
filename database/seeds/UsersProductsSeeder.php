<?php

use Illuminate\Database\Seeder;

class UsersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($user = 1; $user <= 6; $user++) {
            for ($x = 1; $x <= 10; $x++) {
                DB::table('users_products')->insert([
                    'user_id' => $user,
                    'product_id' => $x
                ]);
            }
        }
    }
}
