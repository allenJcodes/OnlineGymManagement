<?php

namespace Database\Seeders;

use App\Models\PaymentMode;
use Illuminate\Database\Seeder;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMode::create([
            'name' => 'Cash',
        ]);

        PaymentMode::create([
            'name' => 'GCash',
        ]);
    }
}
