@extends('layouts.app')

@section('content')
    <div class="pt-14">
        <form action="{{ route('manage.subscription.store') }}" method="POST" class="flex flex-col gap-3">
            @csrf

            <div class="form-field-container">
                <label for="name" class="form-label">Subscription Name</label>
                <input id="name" type="text" name="name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="price" class="form-label">Subscription Price</label>
                <input id="price" type="text" name="price" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="number_of_months" class="form-label">Duration (Months)</label>
                <input id="number_of_months" type="text" name="number_of_months" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="description" class="form-label">Description</label>
                <input id="description" type="text" name="description" class="form-input">
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

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Subscription</button>
        </form>
    </div>
@endsection

