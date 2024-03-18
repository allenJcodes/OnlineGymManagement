<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subs = Subscription::search()->where('user_id', auth()->user()->id)->with('subscriptionTypes')->paginate(10);
        return view('features.subscriptions.Subscription', compact('subs'));
    }
}
