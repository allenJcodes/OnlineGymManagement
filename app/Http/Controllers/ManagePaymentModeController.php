<?php

namespace App\Http\Controllers;

use App\Models\PaymentMode;
use App\Http\Requests\PaymentMode\PaymentModeStoreRequest;
use App\Http\Requests\PaymentMode\PaymentModeUpdateRequest;

class ManagePaymentModeController extends Controller
{
    public function index()
    {
        $model = PaymentMode::paginate(10);
        return view('features.manage_payment_modes.PaymentModes', compact('model'));
    }

    public function create()
    {
        return view('features.manage_payment_modes.AddPaymentMode');
    }

    public function store(PaymentModeStoreRequest $request)
    {
        if ($request->image){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('image/payment_mode'), $newImageName);
        }

        PaymentMode::create([...$request->validated(), 'image' => $newImageName ?? '']);

        return redirect()->route('manage.payment_modes.index')->with('toast', [
            'status' => 'success',
            'message' => 'Payment Mode added successfully.',
        ]);
    }

    public function edit(PaymentMode $PaymentMode)
    {
        return view('features.manage_payment_modes.EditPaymentMode', ['payment_mode' => $PaymentMode]);
    }

    public function update(PaymentModeUpdateRequest $request, PaymentMode $PaymentMode)
    {
        if ($request->image) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('image/payment_mode'), $newImageName);
        } else {
            $newImageName = $PaymentMode->image;
        }

        $PaymentMode->update([...$request->validated(), 'image' => $newImageName]);

        return redirect()->route('manage.payment_modes.edit', ['payment_mode' => $PaymentMode])->with('toast', [
            'status' => 'success',
            'message' => 'Payment Mode updated successfully.',
        ]);
    }

    public function destroy(PaymentMode $PaymentMode)
    {
        $PaymentMode->delete();
        return redirect()->route('manage.payment_modes.index');
    }
}
