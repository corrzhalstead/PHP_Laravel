<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::query()->delete();

        $faker = \Faker\Factory::create();

        foreach(range(1,500) as $number) {
            \App\Models\Customer::create([

                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'age' => $faker->numberBetween(1,100),
                'address' => $faker->address,
                'city' => $faker->city
        ]);
        }
    }
}
