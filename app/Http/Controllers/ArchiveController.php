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
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        return view('features.archives.archives');
    }

    public function usersIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $users = User::onlyTrashed()->search()->with('role')->where('user_role', '!=', 2)->paginate(10);
        return view('features.archives.users-archives', compact('users'));
    }

    public function instructorsIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $instructors = Instructor::onlyTrashed()->search()->with('user')->paginate(10);
        return view('features.archives.instructors-archives', compact('instructors'));
    }

    public function gymSessionIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $gym_sessions = GymSession::onlyTrashed()->search()->paginate(10);
        return view('features.archives.contents.gym-session-archives', compact('gym_sessions'));
    }
    
    public function learnIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $learnContents = LearnContent::onlyTrashed()->search()->paginate(10);
        return view('features.archives.contents.learn-archives', compact('learnContents'));
    }
    
    public function faqIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $faqs = FAQ::onlyTrashed()->search()->paginate(10);
        return view('features.archives.contents.faq-archives', compact('faqs'));
    }

    public function contactIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }
        
        $contacts = ContactDetail::onlyTrashed()->search()->with('ContactDetailType')->paginate(10);
        return view('features.archives.contents.contact-archives', compact('contacts'));
    }

    public function equipmentsIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $equipments = Equipment::onlyTrashed()->with('equipmentStatus')->get();
        return view('features.archives.equipments-archives', compact('equipments'));
    }

    public function inventoryIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $inventories = Inventory::onlyTrashed()->search()->with('equipment')->paginate(10);
        return view('features.archives.inventory-archives', compact('inventories'));
    }

    public function manageSubscriptionsIndex() {
        if (auth()->user()->role->id != 1) {
            return redirect()->route('home');
        }

        $subscriptions = SubscriptionType::onlyTrashed()->search()->with('inclusions')->paginate(10);
        return view('features.archives.manage-subscriptions-archives', compact('subscriptions'));
    }
}
