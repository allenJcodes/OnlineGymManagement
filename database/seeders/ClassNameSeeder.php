<?php

namespace Database\Seeders;

use App\Models\ClassName;
use Illuminate\Database\Seeder;

class ClassNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassName::create([
            'name' => 'Plyometrics',
        ]);
        
        ClassName::create([
            'name' => 'Yoga',
        ]);

        ClassName::create([
            'name' => 'Cardio',
        ]);

        ClassName::create([
            'name' => 'Chest Day',
        ]);

        ClassName::create([
            'name' => 'Back Day',
        ]);

        ClassName::create([
            'name' => 'Leg Day',
        ]);

        ClassName::create([
            'name' => 'Laterals',
        ]);
    }
}
