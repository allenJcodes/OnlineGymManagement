<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::create([
            'title' => 'Where exactly are you located?',
            'content' => 'Olympus Road Athena St. in Phase 3 of North Olympus Subdivision, Quezon City'
        ]);
        
        FAQ::create([
            'title' => 'What are the membership options available?',
            'content' => 'There are 3 membership options, 1 is the walk-in session, 2 is the monthly , 3 is the yearly'
        ]);

        FAQ::create([
            'title' => 'Are they any age restriction to join the gym?',
            'content' => 'Similarly, you have to judge your stamina before joining a gym. Most people stop their kids to join a gym at an early age as they know it’s not their time to do it. The muscles of a 17-18 years man are stronger than a 13-14 years boy.'
        ]);

        FAQ::create([
            'title' => 'What are your gym hours?',
            'content' => 'Our gym is open to 7:00 AM to 9:00 PM both weekends and weekdays.'
        ]);

        FAQ::create([
            'title' => 'Do you offer personal training services?',
            'content' => 'Yes, we have a different tpye of gym instructor that can help anyone.'
        ]);


    }
}
