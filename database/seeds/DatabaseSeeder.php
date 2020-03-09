<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $start = strtotime("10 September 2019");
        $end = strtotime("03 March 2020");

        foreach (range(1, 10) as $index) {
            $timestamp = mt_rand($start, $end);
            DB::table('wagers')->insert([
                'total_wager_value' => $faker->numberBetween($min = 0, $max = 20000),
                'odds' => $faker->numberBetween($min = 1, $max = 500),
                'selling_percentage' =>  $faker->numberBetween($min = 1, $max = 100),
                'selling_price' =>  $faker->numberBetween($min = 3000, $max = 20000),
                'current_selling_price' =>  $faker->numberBetween($min = 3000, $max = 20000),
                'percentage_sold' =>  $faker->numberBetween($min = 1, $max = 100),
                'amount_sold' =>  $faker->numberBetween($min = 2, $max = 50),
                'placed_at' =>  date("Y-m-d H:i:s", $timestamp),
            ]);
        }
        foreach (range(1, 5) as $index) {
            $timestamp = mt_rand($start, $end);
            DB::table('carts')->insert([
                'buying_price' =>  $faker->numberBetween($min = 3000, $max = 20000),
                'wager_id' =>  $faker->numberBetween($min = 2, $max = 10),
                'quantity' =>  $faker->numberBetween($min =1, $max = 100),
                'bought_at' =>  date("Y-m-d H:i:s", $timestamp),
            ]);
        }
    }
}
