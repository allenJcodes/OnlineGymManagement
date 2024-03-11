@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        <h1 class="text-2xl font-bold">Edit Instructor</h1>

        <form action="{{ route('instructor.update', ['instructor' => $instructor]) }}" method="POST" class="flex flex-col gap-3 card">
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

            <div class="self-end flex gap-2">
                <a href="{{ route('instructor.index') }}" class="outline-button"> 
                    Back 
                </a>
                <button class="primary-button">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
