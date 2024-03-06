<?php

namespace Database\Seeders;

use App\Models\ContactDetail;
use Illuminate\Database\Seeder;

class ContactDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactDetail::create([
            'contact_detail_type_id' => 1,
            'label' => 'Main Location',
            'content' => 'Olympus Road Athena St. in Phase 3 of North Olympus Subdivision, Quezon City'
        ]);

        ContactDetail::create([
            'contact_detail_type_id' => 2,
            'label' => 'Gym Phone',
            'content' => '0928 302 0910'
        ]);

        ContactDetail::create([
            'contact_detail_type_id' => 2,
            'label' => "Owners's contact number",
            'content' => '0928 302 0910'
        ]);

        ContactDetail::create([
            'contact_detail_type_id' => 3,
            'label' => 'Email',
            'content' => 'Japsgymfitness@gmail.com'
        ]);
    }
}
