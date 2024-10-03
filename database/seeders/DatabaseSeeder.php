<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'user_id' => $faker->numberBetween(1, 3),
                'title' => $faker->name,
                'detail' => $faker->realText(1500),
                'booked_from' => $faker->dateTimeBetween('now', '+1 week'),
                'booked_to' => $faker->dateTimeBetween('+1 week', '+2 week'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}