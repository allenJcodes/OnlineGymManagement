<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use App\Models\SubscriptionTypeInclusion;
use Illuminate\Database\Seeder;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionType::create([
            'name' => 'Monthly',
            'price' => 2400.00,
            'number_of_months' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus ullam mollitia similique. Eligendi nulla temporibus assumenda delectus expedita, repellendus non.'
        ])->inclusions()->saveMany([
            new SubscriptionTypeInclusion(['name' => 'Inclusion 1']),
            new SubscriptionTypeInclusion(['name' => 'Inclusion 2']),
        ]);
        

        SubscriptionType::create([
            'name' => 'Yearly',
            'price' => 3600.00,
            'number_of_months' => 12,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus ullam mollitia similique. Eligendi nulla temporibus assumenda delectus expedita, repellendus non.'
        ]);
    }
}
