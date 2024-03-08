@extends('layouts.app')

@section('content')
    <div class="pt-14">

        <form method="POST" action="{{ route('registerUser') }}" class="flex flex-col gap-3">

            @csrf

            <div class="form-field-container">
                <label for="first_name" class="form-label">First Name</label>
                <input id="first_name" type="text" name="first_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input id="middle_name" type="text" name="middle_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="last_name" class="form-label">First Name</label>
                <input id="last_name" type="text" name="last_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="email" class="form-label">Email address</label>
                <input id="email" type="email" name="email" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="user_role" class="form-input">
                    <option value="" disabled selected>Choose a User Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Staff</option>
                    <option value="3">User</option>
                </select>
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <button type="submit"
                class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                User</button>

        </form>

    </div>
@endsection
