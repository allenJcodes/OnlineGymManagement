<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use App\Models\Equipment;
use App\Models\FAQ;
use App\Models\GymSession;
use App\Models\Instructor;
use App\Models\Inventory;
use App\Models\LearnContent;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.archives.archives');
    }

    public function usersIndex() {
        $users = User::onlyTrashed()->search()->with('role')->where('user_role', '!=', 2)->paginate(10);
        return view('features.archives.users-archives', compact('users'));
    }

    public function instructorsIndex() {
        $instructors = Instructor::onlyTrashed()->search()->with('user')->paginate(10);
        return view('features.archives.instructors-archives', compact('instructors'));
    }

    public function gymSessionIndex() {
        $gym_sessions = GymSession::onlyTrashed()->search()->paginate(10);
        return view('features.archives.contents.gym-session-archives', compact('gym_sessions'));
    }
    
    public function learnIndex() {
        $learnContents = LearnContent::onlyTrashed()->search()->paginate(10);
        return view('features.archives.contents.learn-archives', compact('learnContents'));
    }
    
    public function faqIndex() {
        $faqs = FAQ::onlyTrashed()->search()->paginate(10);
        return view('features.archives.contents.faq-archives', compact('faqs'));
    }

    public function contactIndex() {
        $contacts = ContactDetail::onlyTrashed()->search()->with('ContactDetailType')->paginate(10);
        return view('features.archives.contents.contact-archives', compact('contacts'));
    }

    public function equipmentsIndex() {
        $equipments = Equipment::onlyTrashed()->with('equipmentStatus')->get();
        return view('features.archives.equipments-archives', compact('equipments'));
    }

    public function inventoryIndex() {
        $inventories = Inventory::onlyTrashed()->search()->with('equipment')->paginate(10);
        return view('features.archives.inventory-archives', compact('inventories'));
    }

    public function manageSubscriptionsIndex() {
        $subscriptions = SubscriptionType::onlyTrashed()->search()->with('inclusions')->paginate(10);
        return view('features.archives.manage-subscriptions-archives', compact('subscriptions'));
    }
}
