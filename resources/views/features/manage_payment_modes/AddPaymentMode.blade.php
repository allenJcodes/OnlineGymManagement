@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <h1 class="text-2xl font-bold">Add Payment Mode</h1>

        <form enctype="multipart/form-data" action="{{ route('manage.payment_modes.store') }}" method="POST"
            class="flex flex-col gap-3 card">
            @csrf

            <div class="form-field-container">
                <label for="name" class="form-label">Mode Name</label>
                <input id="name" type="text" name="name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="account_no" class="form-label">Account Number</label>
                <input id="account_no" type="text" name="account_no" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="image" class="form-label">QR Image</label>
                <input id="image" type="file" name="image" class="form-input">
            </div>


            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('manage.payment_modes.index') }}" class="outline-button">
                    Cancel
                </a>
                <button class="primary-button">Add Payment Mode</button>
            </div>

        </form>
    </div>
@endsection
