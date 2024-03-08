@extends('layouts.app')

@section('content')
    <div class="pt-14">
        <form action="{{ route('instructor.update', ['instructor' => $instructor]) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="first_name" class="form-label">First Name</label>
                <input value="{{$instructor->first_name}}" id="first_name" type="text" name="first_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="last_name" class="form-label">Last Name</label>
                <input value="{{$instructor->last_name}}" id="last_name" type="text" name="last_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="description" class="form-label">Description</label>
                <input value="{{$instructor->description}}" id="description" type="text" name="description" class="form-input">
            </div>

            @if ($errors->any())

            <div class="flex flex-col gap-1">
                @foreach ($errors->all() as $error)
                    <p class="text-red-500 text-xs">{{$error}}</p>
                @endforeach
            </div>
            @endif

            <a href="{{ route('instructor.index') }}">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Back
                </button>
            </a>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Instructor</button>
        </form>
    </div>
@endsection
