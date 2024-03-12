<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'first_name' => "Admin",
            'last_name' => "User",
            'email' => "admin@email.com",
            'user_role' => 1,
            'password' => Hash::make("password"),
        ]);

        // INSTRUCTOR SEEDER (COMMENT OUT PAG MERON NA)
        User::create([
            'first_name' => "Joel",
            'last_name' => "Garcia",
            'email' => "JmigsGarcia@email.com",
            'user_role' => 2,
            'password' => Hash::make("password"),
        ]);

        User::create([
            'first_name' => "Roldan",
            'last_name' => "Hernandez",
            'email' => "teyow@email.com",
            'user_role' => 2,
            'password' => Hash::make("password"),
        ]);

        //GENERATE CUSTOMERS
        User::factory(10)->create();

        // ROLE SEEDER (COMMENT OUT PAG MERON NA)
        UserRoles::create([
            'role_name' => 'Admin'
        ]);
        UserRoles::create([
            'role_name' => 'Instructor'
        ]);
        UserRoles::create([
            'role_name' => 'Customer'
        ]);

        $this->call([
            LearnSeeder::class,
            FAQSeeder::class,
            ContactDetailTypeSeeder::class,
            ContactDetailSeeder::class,
            SubscriptionTypeSeeder::class,
            EquipmentTypeSeeder::class,
            InstructorSeeder::class
        ]);
    }
}
