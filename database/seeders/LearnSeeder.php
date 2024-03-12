<?php

namespace Database\Seeders;

use App\Models\LearnContent;
use Illuminate\Database\Seeder;

class LearnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LearnContent::create([
            'title' => 'Learn The Fundamentals of Physical Fitness',
            'subtitle' => 'Undestanding the fundamentals of physical fitness is crucial for a healthy and active lifestyle.',
            'content' => 'We provide valuable knowledge on cardiovascular endurance, strength training, flexibility, and body composition.',
            'image' => 'home-logo-2.jpg'
        ]);

        LearnContent::create([
            'title' => 'Learn Proper Nutritions',
            'subtitle' => 'Understanding proper nutrition is key to achieving optimal health and well-being. In our Learn section, we delve into the principles of balanced eating, nutrient-rich food, and maitaining a healthy diet.',
            'content' => "Start your journey towards a healthier lifestyle by gaining a deeper understanding of proper nutritions. Let's make informed choices and prioritize our well-being together!",
            'image' => 'home-image3.jpg'
        ]);
    }
}
