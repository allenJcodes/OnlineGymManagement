<?php

namespace Database\Seeders;

use App\Models\EquipmentDescription;
use Illuminate\Database\Seeder;

class EquipmentDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EquipmentDescription::create([
            'content' => 'For chest workout'
        ]);

        EquipmentDescription::create([
            'content' => 'For back workout'
        ]);

        EquipmentDescription::create([
            'content' => 'For shoulder workout'
        ]);

        EquipmentDescription::create([
            'content' => 'For shoulder/legs workout'
        ]);

        EquipmentDescription::create([
            'content' => 'For legs workout'
        ]);

        EquipmentDescription::create([
            'content' => 'For cardio workout'
        ]);
    }
}
