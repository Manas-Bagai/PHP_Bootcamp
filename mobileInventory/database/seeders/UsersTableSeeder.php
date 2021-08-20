<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        User::truncate();
        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'mobile_number' => '9998887777',
        ]);
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'mobile_number' => $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}
