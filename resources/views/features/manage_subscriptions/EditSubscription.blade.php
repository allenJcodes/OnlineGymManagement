@extends('layouts.app')

@section('content')
    
    <div class="flex flex-col pt-16 gap-5 text-background">
        <h1 class="text-2xl font-bold">Edit Subscription</h1>

        <form action="{{ route('manage.subscription.update', ['subscription' => $subscription]) }}" method="POST" class="flex flex-col gap-3 card">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="name" class="form-label">Subscription Name</label>
                <input value="{{$subscription->name}}" id="name" type="text" name="name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="price" class="form-label">Subscription Price</label>
                <input value="{{$subscription->price}}" id="price" type="text" name="price" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="number_of_months" class="form-label">Duration (Months)</label>
                <input value="{{$subscription->number_of_months}}" id="number_of_months" type="text" name="number_of_months" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="description" class="form-label">Description</label>
                <input value="{{$subscription->description}}" id="description" type="text" name="description" class="form-input">
            </div>

            <div id="add-inclusions" class="flex flex-col gap-3" data-_inclusions="{{ $subscription->inclusions }}">
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('manage.subscription.index') }}" class="outline-button">
                    Back
                </a>
                <button class="primary-button">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
