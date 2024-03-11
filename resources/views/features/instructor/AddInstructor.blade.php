@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5 text-background">
        <h1 class="text-2xl font-bold">Add Instructor</h1>


        <form action="{{ route('instructor.store') }}" method="POST" class="flex flex-col gap-3 card">
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

            <div class="self-end flex gap-2">
                <a href="{{ route('instructor.index') }}" class="outline-button">
                    Cancel
                </a>
                <button class="primary-button">Add Instructor</button>
            </div>

        </form>
    </div>
@endsection
