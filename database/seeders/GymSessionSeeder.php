<?php

namespace Database\Seeders;

use App\Models\GymSession;
use Illuminate\Database\Seeder;

class GymSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GymSession::create([
            'title' => 'Virtual',
            'content' => 'Virtual gym classes enable individuals to engage in workouts remotely using video streaming platforms or fitness apps, offering convenience and flexibility for participants to exercie from any location.'
        ]);
        
        GymSession::create([
            'title' => 'Hybrid',
            'content' => 'Hybrid gym classes provide a combination of virtual and in-person options, allowing participants to choose between remote or physical attendance, catering to diverse preferences and cirumstances.'
        ]);

        GymSession::create([
            'title' => 'In Person',
            'content' => 'Real-time guidance from qualified instructors, a motivating workout environment, and the opportunity to interact with fellow attendees.'
        ]);
    }
}
