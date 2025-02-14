<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user fake
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'user_name'         => fake()->name(),
                'phone'             => fake()->phoneNumber(),
                'address'           => fake()->address(),
                'email'             => fake()->unique()->safeEmail(),
                'password'          => Hash::make('password'),
            ]);
        }
    }
}
