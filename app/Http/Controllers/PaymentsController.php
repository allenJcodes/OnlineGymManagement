<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payments;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\MembershipService;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Payments::class, 'payments');
    }
    
    public function index()
    {
        $payments = Payments::search()->with(['subscriptions', 'subscriptions.user', 'subscriptions.subscriptionTypes'])
        ->when(auth()->user()->user_role != 1, function($whenQuery) {
            $whenQuery->whereHas('subscriptions', function($whereHas) {
                $whereHas->where('subscriptions.user_id', auth()->user()->id);
            });
        })->orderBy('payments.created_at', 'desc')->paginate(10);

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

    public function updateStatus(Request $request, MembershipService $membershipService)
    {
        $payment = Payments::find($request->payment_id);
        // Paid, Verifying, Failed

        if (($payment->status === 'Failed' ) && $request->status !== 'Failed') {
            return redirect()->route('payments.index')->with('toast', [
                'status' => 'error',
                'message' => 'Failed payments cannot be updated.',
            ]);
        }

        if (($payment->status !== 'Paid' ) && $request->status === 'Paid') {

            $data = [
                'user_id' => $payment->subscriptions->user_id,
                'subscription_type_id' => $payment->subscriptions->subscription_type_id,
                'mode_of_payment' => $payment->mode_of_payment,
                'reference_number' => $payment->reference_number,
            ];

            $jsonRequest = json_encode($data);

            $user = User::find($payment->subscriptions->user_id);
            $filePath = $membershipService->generateUserQR($jsonRequest, $user);

            Subscription::where('id', $payment->subscription_id)->update([
                'start_date' => now(),
                'end_date' => Carbon::parse(now())->addMonths($payment->subscriptions->subscriptionTypes->number_of_months),
                'qr_code' => $filePath,
                'status' => 'Active'
            ]);  
        } 
        
        if (($payment->status !== 'Paid' ) && $request->status === 'Failed') {
            Subscription::where('id', $payment->subscription_id)->update([
                'status' => 'Failed'
            ]);
        }

        $payment->status = $request->status;
        $payment->save();

        return redirect()->route('payments.index')->with('toast', [
            'status' => 'success',
            'message' => 'Payment updated successfully.',
        ]);
    }    
}
