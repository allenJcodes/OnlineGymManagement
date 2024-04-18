<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base_path" content="{{ url('/') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Japs Fitness Gym</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> di na need --}} 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- SWAL san ginamit to --}} 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    {{-- TOAST --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body class="font-red-hat-display">
    <div id="app" class="relative">
        <x-toast />
        <header class="antialiased">
            <nav class="bg-background border-gray-200 px-4 lg:px-6 py-2.5 fixed w-full z-20 top-0 left-0">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="flex justify-start items-center">

                        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                            aria-controls="default-sidebar" type="button"
                            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                            <span class="sr-only">Toggle sidebar</span>
                        </button>
                        <a href="{{ route('home') }}" class="flex mr-4">
                            {{-- <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8"
                                alt="FlowBite Logo" /> --}}
                            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Japs Fitness
                                Gym</span>
                        </a>
                    </div>
                    <div class="flex items-center lg:order-2">
                        {{-- <button type="button"
                            class="hidden sm:inline-flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"><svg
                                aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg> New Widget</button>
                        <button id="toggleSidebarMobileSearch" type="button"
                            class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Search</span>
                            <!-- Search icon -->
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button> --}}
                        <span id="datetime" class="text-sm mx-2 font-semibold whitespace-nowrap text-white"></span>

                        <!-- Notifications -->
                        <x-user-notification/>

                        <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdowns">
                            <span class="sr-only">Open user menu</span>

                            <div class="h-8 w-8 flex items-center justify-center rounded-full aspect-square overflow-clip bg-dashboard-accent-base">
                                
                                @if(auth()->user()->profile_image)
                                    <img src="{{ asset('/images/user/' . auth()->user()->profile_image) }}" alt="Profile Image" class="object-contain w-full h-full">
                                @else
                                    <box-icon class="object-contain h-4 w-4 fill-white" type="solid" name='user' ></box-icon>
                                @endif
                                {{-- add default user photo here --}}
                            </div>
                        </button>

                        <!-- Dropdown menu -->
                        <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdowns">
                            <div class="py-3 px-4">
                                <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ Auth::user()->full_name }} 
                                </span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                                    {{ Auth::user()->role->role_name }}
                                </span>
                                <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ Auth::user()->email }}
                                </span>
                            </div>


                            <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                                <li>
                                    <a href="{{ route('profile.show') }}"
                                        class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <button class="w-full">Edit Profile</button>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        @csrf
                                        
                                        <button type="submit" class="w-full">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        @extends('layouts.sidebar')
        <div class="p-4 sm:ml-64 min-h-screen bg-dashboard-background">
            @yield('content')
        </div>

    </div>
</body>
<script>
   
function updateDateTime() {
    let dateTimeElement = document.getElementById('datetime');
    let currentDate = new Date();

    let formattedDateTime = currentDate.toLocaleString('en-US', { weekday: 'short', month: 'short', day: '2-digit', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true });
    dateTimeElement.innerText = formattedDateTime;
}

updateDateTime();

setInterval(updateDateTime, 60000); 

</script>
</html>
