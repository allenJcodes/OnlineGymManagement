<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\LearnContent;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index() {
        
        $learnContent = LearnContent::all();
        $FAQs = FAQ::all();
        return view('welcome', compact('learnContent', 'FAQs'));
    }
}
