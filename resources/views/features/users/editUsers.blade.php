@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5 text-background">
        <h1 class="text-2xl font-bold">Edit User</h1>

        <form method="POST" action="{{ route('user.update', ['user' => $user]) }}" class="flex flex-col gap-3 card">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="first_name" class="form-label">First Name</label>
                <input value="{{ $user->first_name }}" id="first_name" type="text" name="first_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input value="{{ $user->middle_name }}" id="middle_name" type="text" name="middle_name"
                    class="form-input">
            </div>

            <div class="form-field-container">
                <label for="last_name" class="form-label">First Name</label>
                <input value="{{ $user->last_name }}" id="last_name" type="text" name="last_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="email" class="form-label">Email address</label>
                <input value="{{ $user->email }}"id="email" type="email" name="email" class="form-input">
            </div>


            <div class="form-field-container">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-input">
            </div>


            <div class="form-field-container">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="user_role" class="form-input">
                    <option value="" disabled selected>Choose a country</option>
                    <option {{ $user->user_role == '1' ? 'selected' : '' }} value="1">Admin</option>
                    {{-- <option {{ $user->user_role == '2' ? 'selected' : '' }} value="2">Instructor</option> --}}
                    <option {{ $user->user_role == '3' ? 'selected' : '' }} value="3">User</option>
                </select>
            </div>


            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('user.index') }}" class="outline-button">
                    Back
                </a>

                <button type="submit" class="primary-button">
                    Save Changes
                </button>
            </div>
        </form>

    </div>
@endsection
