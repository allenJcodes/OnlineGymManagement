@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5 text-background">
        <h1 class="text-2xl font-bold">Edit Profile</h1>
            <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST" class="flex flex-col gap-3 card">
                @csrf
                @method('PUT')

                <div class="form-field-container">
                    <label for="first_name" class="form-label">First Name</label>
                    <input value="{{ old('first_name', auth()->user()->first_name) }}" id="first_name" type="text" name="first_name" class="form-input">
                </div>

                <div class="form-field-container">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input value="{{ old('middle_name', auth()->user()->middle_name) }}" id="middle_name" type="text" name="middle_name" class="form-input">
                </div>

                <div class="form-field-container">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input value="{{ old('last_name', auth()->user()->last_name) }}" id="last_name" type="text" name="last_name" class="form-input">
                </div>

                <div class="form-field-container">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email', auth()->user()->email) }}" id="email" type="text" name="email" class="form-input">
                </div>

                <div class="form-field-container">
                    <label for="password" class="form-label">New Password</label>
                    <input value="{{ old('password') }}" id="password" type="password" name="password" class="form-input">
                </div>
                
                <div class="form-field-container">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input value="{{ old('password_confirmation', auth()->user()->password_confirmation) }}" id="password_confirmation" type="password" name="password_confirmation" class="form-input">
                </div>

                @if (auth()->user()->profile_image != '')
                    <img src="{{ asset('/images/user/' . auth()->user()->profile_image) }}" alt="Profile Image" width="140px" height="140px">
                @endif

                <div class="form-field-container">
                    <label for="profile_image" class="form-label">Change Profile Image</label>
                    <input value="{{ old('profile_image', auth()->user()->profile_image) }}" id="profile_image" type="file" name="profile_image" class="form-input">
                </div>

                @if ($errors->any())
                    <div class="flex flex-col gap-1">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-xs">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                
                <div class="self-end flex gap-2">
                    <a href="#" class="outline-button">
                        Cancel
                    </a>
                    
                    <button type="submit" class="primary-button">
                        Save Changes
                    </button>
                </div>

            </form>
    </div>
@endsection
