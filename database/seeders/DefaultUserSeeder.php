<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ADMINS
        User::create([
            'first_name' => "Admin",
            'last_name' => "User",
            'email' => "admin@email.com",
            'user_role' => 1,
            'password' => Hash::make("password"),
        ]);

        User::create([
            'first_name' => "Seth",
            'last_name' => "De Gana",
            'email' => "seth@email.com",
            'user_role' => 1,
            'password' => Hash::make("password"),
        ]);

        // INSTRUCTOR
        User::create([
            'first_name' => "Jacob",
            'last_name' => "Peregrino",
            'email' => "jacob@email.com",
            'user_role' => 2,
            'password' => Hash::make("password"),
        ]);

        //CUSTOMER
        User::create([
            'first_name' => "Joshua",
            'last_name' => "Lambanog",
            'email' => "joshua@email.com",
            'user_role' => 3,
            'password' => Hash::make("password"),
        ]);
    }
}
