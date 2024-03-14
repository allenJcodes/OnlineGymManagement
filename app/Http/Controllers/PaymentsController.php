<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payments::with(['subscriptions', 'subscriptions.user', 'subscriptions.subscriptionTypes'])
        ->when(auth()->user()->user_role != 1, function($whenQuery) {
            $whenQuery->whereHas('subscriptions', function($whereHas) {
                $whereHas->where('subscriptions.user_id', auth()->user()->id);
            });
        })->paginate(10);

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

    public function printReports() {
        $payments = Payments::with(['subscriptions', 'subscriptions.user', 'subscriptions.subscriptionTypes'])
        ->when(auth()->user()->user_role != 1, function($whenQuery) {
            $whenQuery->whereHas('subscriptions', function($whereHas) {
                $whereHas->where('subscriptions.user_id', auth()->user()->id);
            });
        })->get();

        return view('features.payment.Report', compact('payments'));
    }
    
}
