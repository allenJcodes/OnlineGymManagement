<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'description' =>  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, consequuntur!"
        ]);

        Instructor::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'description' =>  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, consequuntur!"
        ]);
    }
}
