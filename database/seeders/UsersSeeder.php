<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'name'              => $faker->name,
            'email'             => 'admin@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'is_admin'          => 1
        ]);

        $demoUser2 = User::create([
            'name'              => $faker->name,
            'email'             => 'student@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'is_student'        => 1
        ]);

        $demoUser3 = User::create([
            'name'              => $faker->name,
            'email'             => 'leturer@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'is_lecturer'       => 1
        ]);
    }
}
