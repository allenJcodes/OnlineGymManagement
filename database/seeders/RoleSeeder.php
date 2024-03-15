<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRoles::create([
            'role_name' => 'Admin'
        ]);

        UserRoles::create([
            'role_name' => 'Instructor'
        ]);

        UserRoles::create([
            'role_name' => 'Customer'
        ]);

    }
}
