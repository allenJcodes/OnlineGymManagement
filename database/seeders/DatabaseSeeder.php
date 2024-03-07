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
            'name' => "admin",
            'email' => "admin@email.com",
            'user_role' => 1,
            'password' => Hash::make("password"),
        ]);

        // STAFF SEEDER (COMMENT OUT PAG MERON NA)
        User::create([
            'name' => "Joel",
            'email' => "JmigsGarcia@email.com",
            'user_role' => 2,
            'password' => Hash::make("password"),
        ]);

        User::create([
            'name' => "Roldan",
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
            'role_name' => 'Staff'
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
            EquipmentTypeSeeder::class,,
            InstructorSeeder::class
        ]);
    }
}
