<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role == 1) {
            $payments = Payments::with(['subscriptions', 'subscriptions.user', 'subscriptions.subscriptionTypes'])->get();
        }
        else {
            $payments = Payments::with(['subscriptions', 'subscriptions.user', 'subscriptions.subscriptionTypes'])
            ->whereHas('subscriptions', function($query) {
                $query->where('subscriptions.user_id', auth()->user()->id);
            })->get();
        }
        return view('features.payment.Payment', compact('payments'));
    }

    public function show($id)
    {

    }

    public function updateReferenceNumber(Request $request)
    {
        Payments::where('id', $request->id)->update([
            'payment_reference_no' => $request->referenceNo
        ]);
    }
}
