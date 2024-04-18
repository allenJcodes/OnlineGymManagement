@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <h1 class="text-2xl font-bold">Add Subscription</h1>

        <form action="{{ route('manage.subscription.store') }}" method="POST" class="flex flex-col gap-3 card">
            @csrf

            <div class="form-field-container">
                <label for="name" class="form-label">Subscription Name</label>
                <input id="name" type="text" name="name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="price" class="form-label">Subscription Price</label>
                <input id="price" type="text" name="price" class="form-input">
            </div>

            <div class="flex gap-1 items-end">
                <div class="form-field-container w-1/4">
                    <label for="duration" class="form-label">Duration</label>
                    <input id="duration" type="number" name="duration" class="form-input">
                </div>

                <div class="form-field-container w-1/4">
                    {{-- <label for="duration_type" class="form-label"></label> --}}
                    <select name="duration_type" id="duration_type" class="form-input">
                        <option value="day">Day/s</option>
                        <option value="month">Month/s</option>
                    </select>
                </div>
            </div>

            <div class="form-field-container">
                <label for="description" class="form-label">Description</label>
                <input id="description" type="text" name="description" class="form-input">
            </div>

            <div class="form-field-container flex-row-reverse gap-2 w-fit">
                <label for="best_option" class="form-label">Mark as Best Option</label>
                <input id="best_option" type="checkbox" name="best_option" class="form-input">
            </div>

            <div id="add-inclusions" class="flex flex-col gap-3">
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
                    Cancel
                </a>
                <button class="primary-button">Add Subscription</button>
            </div>

        </form>
    </div>
@endsection

