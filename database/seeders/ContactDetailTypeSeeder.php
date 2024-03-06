<?php

namespace Database\Seeders;

use App\Models\ContactDetailType;
use Illuminate\Database\Seeder;

class ContactDetailTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactDetailType::create([
            'name' => 'address'
        ]);

        ContactDetailType::create([
            'name' => 'contact_number'
        ]);

        ContactDetailType::create([
            'name' => 'email'
        ]);
    }
}
