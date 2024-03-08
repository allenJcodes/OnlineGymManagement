@extends('layouts.app')

@section('content')
    <div class="container pt-14">
        <h1 class="text-2xl font-semibold my-2">EDIT PROFILE</h1>

        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="relative z-0 w-full mb-6 group">

                    <label for="name" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg borde border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        placeholder="Name">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    <label for="email" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Email">

                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    <label for="password" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">New
                        Password</label>
                    <input id="password" type="password" name="password"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    <label for="password_confirmation"
                        class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        New Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Confirm New Password">

                    <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="profile_image">Change
                        Profile Picture</label>

                    @if (auth()->user()->profile_image != '')
                        <img src="{{ url('storage/' . auth()->user()->profile_image) }}" alt="Profile Image" width="140px"
                            height="140px">
                    @endif
                    <input id="profile_image" type="file" name="profile_image" accept=".png, .jpg, .jpeg"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                </div>
                <div class="flex pt-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>

            </form>
            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
