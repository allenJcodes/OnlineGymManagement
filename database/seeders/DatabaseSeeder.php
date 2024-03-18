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
        $this->call([
            RoleSeeder::class,
            DefaultUserSeeder::class,
            GymSessionSeeder::class,
            LearnSeeder::class,
            FAQSeeder::class,
            ContactDetailTypeSeeder::class,
            ContactDetailSeeder::class,
            SubscriptionTypeSeeder::class,
            EquipmentTypeSeeder::class,
            InstructorSeeder::class
        ]);

        //GENERATE 10 RANDOM CUSTOMERS
        User::factory(10)->create();
    }
}
