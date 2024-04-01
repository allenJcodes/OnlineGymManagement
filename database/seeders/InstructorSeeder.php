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
            'user_id' => 3,
            'description' =>  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, consequuntur!"
        ]);
    }
}
