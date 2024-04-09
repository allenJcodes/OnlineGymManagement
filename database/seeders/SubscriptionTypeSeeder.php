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
            'name' => 'Walk-in',
            'price' => 60.00,
            'duration' => 1,
            'duration_type' => 'day',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus ullam mollitia similique. Eligendi nulla temporibus assumenda delectus expedita, repellendus non.'
        ])->inclusions()->saveMany([
            new SubscriptionTypeInclusion(['name' => 'Inclusion WI1']),
            new SubscriptionTypeInclusion(['name' => 'Inclusion WI2']),
        ]);

        SubscriptionType::create([
            'name' => 'Monthly',
            'price' => 2400.00,
            'duration' => 1,
            'duration_type' => 'month',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus ullam mollitia similique. Eligendi nulla temporibus assumenda delectus expedita, repellendus non.'
        ])->inclusions()->saveMany([
            new SubscriptionTypeInclusion(['name' => 'Inclusion M1']),
            new SubscriptionTypeInclusion(['name' => 'Inclusion M2']),
        ]);
        

        SubscriptionType::create([
            'name' => 'Yearly',
            'price' => 3600.00,
            'duration' => 12,
            'duration_type' => 'month',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus ullam mollitia similique. Eligendi nulla temporibus assumenda delectus expedita, repellendus non.'
        ])->inclusions()->saveMany([
            new SubscriptionTypeInclusion(['name' => 'Inclusion Y1']),
            new SubscriptionTypeInclusion(['name' => 'Inclusion Y2']),
        ]);
    }
}
