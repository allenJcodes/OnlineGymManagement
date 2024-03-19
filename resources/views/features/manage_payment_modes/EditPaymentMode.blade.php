@extends('layouts.app')

@section('content')

    <div class="flex flex-col pt-16 gap-5 text-background">
        <h1 class="text-2xl font-bold">Edit Subscription</h1>

        <form enctype="multipart/form-data"
            action="{{ route('manage.payment_modes.update', ['payment_mode' => $payment_mode]) }}" method="POST"
            class="flex flex-col gap-3 card">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="name" class="form-label">Mode Name</label>
                <input value="{{ $payment_mode->name }}" id="name" type="text" name="name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="account_no" class="form-label">Account Number</label>
                <input value="{{ $payment_mode->account_no }}" id="account_no" type="text" name="account_no"
                    class="form-input">
            </div>

            <div class="form-field-container">
                <label for="image" class="form-label">QR Image</label>
                <input id="image" type="file" name="image" class="form-input">
            </div>

            @if ($payment_mode->image != '')
                <img src="{{ asset('image/payment_mode/' . $payment_mode->image ?? '--') }}" alt="QR Image" width="140px"
                    height="140px">
            @endif


            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('manage.payment_modes.index') }}" class="outline-button">
                    Back
                </a>
                <button class="primary-button">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
