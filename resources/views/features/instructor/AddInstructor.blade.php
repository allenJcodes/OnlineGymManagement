@extends('layouts.app')

@section('content')
    <div class="pt-14 flex flex-col gap-8">
        <h1 class="text-xl">Add Instructor</h1>


        <form action="{{ route('instructor.store') }}" method="POST">
            @csrf
            <div class="form-field-container">
                <label for="first_name" class="form-label">First Name</label>
                <input id="first_name" type="text" name="first_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="last_name" class="form-label">Last Name</label>
                <input id="last_name" type="text" name="last_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="description" class="form-label">Description</label>
                <input id="description" type="text" name="description" class="form-input">
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Instructor</button>
        </form>
    </div>
@endsection
