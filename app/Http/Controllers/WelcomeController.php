<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use App\Models\FAQ;
use App\Models\Instructor;
use App\Models\LearnContent;
use App\Models\SubscriptionType;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index() {
        
        $learnContent = LearnContent::all();
        $FAQs = FAQ::all();
        $contactDetails = ContactDetail::orderBy('contact_detail_type_id')->get();
        $coordinates = ContactDetail::where('contact_detail_type_id', 4)->first();
        $instructors = Instructor::with('user')->get();
        $membershipPricings = SubscriptionType::with('inclusions')->get();
        
        return view('welcome', compact('learnContent', 'FAQs', 'contactDetails', 'coordinates', 'instructors', 'membershipPricings'));
    }
}
