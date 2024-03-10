@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        <h1 class="text-2xl font-bold">Add Equipment Type</h1>

        <form action="{{ route('equipment_types.store') }}" method="POST" class="flex flex-col gap-3 card">
            @csrf

            <div class="form-field-container">
                <label for="name" class="form-label">Equipment Type Name</label>
                <input id="name" type="text" name="name" class="form-input">
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('equipment_types.index') }}" class="outline-button">
                    Cancel
                </a>
                <button class="primary-button">Add Equipment Type</button>
            </div>
        </form>
    </div>
@endsection
