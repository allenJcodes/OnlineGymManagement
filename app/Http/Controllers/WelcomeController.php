<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use App\Models\FAQ;
use App\Models\Instructor;
use App\Models\LearnContent;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index() {
        
        $learnContent = LearnContent::all();
        $FAQs = FAQ::all();
        $contactDetails = ContactDetail::orderBy('contact_detail_type_id')->get();
        $instructors = Instructor::all();
        
        return view('welcome', compact('learnContent', 'FAQs', 'contactDetails', 'instructors'));
    }
}
