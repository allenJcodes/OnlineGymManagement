<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('features.payment.Payment');
    }

    public function getUserPayments(Request $request)
    {
        return Payments::where('user_id', $request->id)->get();
    }

    public function updateReferenceNumber(Request $request)
    {
        Payments::where('id', $request->id)->update([
            'payment_reference_no' => $request->referenceNo
        ]);
    }
}
