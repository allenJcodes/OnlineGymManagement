@extends('layouts.app')

@section('content')
    <div class="pt-14">

        <form method="POST" action="{{ route('updateUser', $user->id) }}" class="flex flex-col gap-3">
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

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
