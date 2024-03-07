<?php

namespace Database\Seeders;

use App\Models\EquipmentType;
use Illuminate\Database\Seeder;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EquipmentType::create([
            'name' => 'Treadmill'
        ]);

        EquipmentType::create([
            'name' => 'Stationary bicycle'
        ]);

        EquipmentType::create([
            'name' => 'Bench'
        ]);

        EquipmentType::create([
            'name' => 'Power rack'
        ]);
    }
}
