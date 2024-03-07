<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title style="color: white">Japs Fitness Gym</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- FLOWBITE --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        title {}

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #212529;
        }
    </style>
</head>

<body>

    <nav class=" dark:bg-gray-900 fixed w-full z-20 top-0 left-0 " style="   background-color: #212529">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">

                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><img
                        src="{{ asset('images/logo.png') }}" alt="" width="50" height="50"></span>
            </a>
            <div class="flex md:order-2">
                @if (Route::has('login'))
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-sticky">
                        <ul
                            class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0  ">
                            <li>
                                <a href="#session"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page"><span
                                        class="text-white hover:text-yellow-300">Session</span></a>
                            </li>
                            <li>
                                <a href="#pricing"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page"><span
                                        class="text-white hover:text-yellow-300">Pricing</span></a>
                            </li>
                            <li>
                                <a href="#learn"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page"><span class="text-white hover:text-yellow-300">Learn</span></a>
                            </li>
                            <li>
                                <a href="#faq"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page"><span class="text-white hover:text-yellow-300">FAQ</span></a>
                            </li>
                            <li>
                                <a href="#instructor"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page"><span
                                        class="text-white hover:text-yellow-300">Instructors</span></a>
                            </li>
                            <li>
                                <a href="#contact"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                    aria-current="page"><span
                                        class="text-white hover:text-yellow-300">Contact</span></a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"><span
                                        class="text-black bg-yellow-400 p-2 rounded-xl hover:bg-gray-400">{{auth()->check() ? 'My Dashboard' : 'Login'}} </span></a>
                            </li>



                        </ul>
                    </div>
                @endif
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

        </div>
    </nav>

    <div class="pt-36 pl-36 pr-36">

        <div class="grid grid-cols-2">
            <div class=" col-span-1  ">
                <Legend class="text-5xl pb-5 text-white ">Become <span class="text-yellow-300">Physically
                        Fit</span>
                </Legend>
                <p class="text-white text-xl pb-5">Welcome to Japs Fitness Gym, an online fitness advocacy dedicated to
                    empowering
                    students to lead
                    healthy
                    and active lifestyle. We understand the imporatnce of phusical well-being in achieving academic
                    success and overall personal growth. Through
                    our virtual platform, we aim to inspire, educate, and support students in their fitness journey,
                    helping them become the best versions of themselves.
                    Join us we embark on a transformative fitness adventure together!
                </p>
                <a href="{{ route('register') }}">
                    <button type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-lg">Register</button>
                </a>
            </div>
            <div class=" col-span-1  "><img src="{{ asset('images/home-image.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="pl-36 pr-36" style="background-color: #dc3545">
        <div class="grid grid-cols-2 pt-12 pb-12">
            <div class="col-span-1">
                <Legend class="text-white text-3xl">Get an Instructor</Legend>
            </div>
            <div class="col-span-1">
                <form>
                    <div class="flex">
                        <label for="search-dropdown"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>

                        <div class="relative w-full">
                            <input type="search" id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Email" required>
                            <button type="submit"
                                class="absolute top-0 right-0 p-2.5 h-full text-sm font-medium text-white bg-gray-800 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- SESSION PAGE --}}
    <section id="session">
        <div class="pl-36 pr-36 pt-36 pb-36 bg-white">
            <legend class="text-5xl pb-5">Gym <span class="text-red-500">Sessions</span></legend>
            <div class="grid grid-cols-3">
                <div class="col-span-1">
                    <div style="background-color: #212529"
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <span class="flex justify-center"> <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3 "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                            </svg></span>
                        <a>
                            <h5
                                class="mb-2 text-2xl font-semibold tracking-tight text-white dark:text-white text-center">
                                Virtual</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Virtual gym classes enable
                            individuals to engage in workouts remotely using video streaming platforms or fitness apps,
                            offering convenience and flexibility for participants to exercie from any location</p>
                        <span class="flex justify-center">
                            <button type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read
                                More</button>
                        </span>
                    </div>
                </div>
                <div class="col-span-1">
                    <div style="background-color: #212529"
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <span class="flex justify-center"> <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3 "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                            </svg></span>
                        <a>
                            <h5
                                class="mb-2 text-2xl font-semibold tracking-tight text-white dark:text-white text-center">
                                Hybrid</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Hybrid gym classes provide a
                            combination of virtual and in-person options, allowing participants to choose between remote
                            or physical attendance, catering to diverse preferences and cirumstances.</p>
                        <span class="flex justify-center">
                            <button type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read
                                More</button>
                        </span>
                    </div>
                </div>
                <div class="col-span-1">
                    <div style="background-color: #212529"
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <span class="flex justify-center"> <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3 "
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                            </svg></span>
                        <a>
                            <h5
                                class="mb-2 text-2xl font-semibold tracking-tight text-white dark:text-white text-center">
                                In Person</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">In-person gym classes takes place
                            at physical fitness facilities, providing participants with real-time guidance from
                            qualified instructors, a motivating workout environment, and the opportunity to interact
                            with fellow attendees.</p>
                        <span class="flex justify-center">
                            <button type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read
                                More</button>
                        </span>
                    </div>
                </div>
            </div>


        </div>
    </section>

    {{-- LEARN PAGE --}}
    <section id="learn">
        <div class="flex flex-col">
            @foreach ($learnContent as $index => $learn_content)
                @php
                    $flipped = ($index+1) % 2 == 0;
                @endphp
   
                <div @class(['pl-36 pr-36', 'bg-white' => !$flipped])>

                    <div @class(['flex py-20 gap-10', 'flex-row-reverse' => $flipped, 'flex-row' => !$flipped]) >
                        <div class="flex-1"><img src="{{ asset($learn_content->image) }}" class="rounded-xl"></div>
                        <div class="flex-1 pl-10 pt-4">
                            <legend @class(['text-4xl pb-5 font-bold', 'text-white' => $flipped])>{{$learn_content->title}}</legend>
                            <legend class="pb-5 text-gray-400 text-lg">{{$learn_content->subtitle}}</legend>
                            <legend @class(['text-xs pb-5', 'text-gray-400' => $flipped])>{{$learn_content->content}}</legend>
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read More</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <x-learn-content flipped={{true}} title="{{$}}" subtitle="" content=""/> --}}
        {{-- <div class="bg-white pl-36 pr-36">
            <div class="grid grid-cols-2 pt-52 pb-20">
                <div class="col-span-1"><img src="{{ asset('images/home-logo-2.jpg') }}" class="rounded-xl"></div>
                <div class="col-span-1 pl-10 pt-4">
                    <legend class="text-4xl pb-5 font-bold">Learn The Fundamentals of Physical Fitness</legend>
                    <legend class="pb-5 text-gray-400 text-lg">Undestanding the fundamentals of physical fitness is
                        crucial
                        for a healthy and active lifestyle.
                    </legend>
                    <legend class="text-xs pb-5">We provide valuable knowledge on cardiovascular endurance, strength
                        training, flexibility, and body composition.
                    </legend>
                    <button type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read
                        More</button>
                </div>
            </div>
        </div>

        <div class=" pl-36 pr-36 pb-20 ">
            <div class="grid grid-cols-2 pt-20">

                <div class="col-span-1 pt-5">
                    <legend class="text-white text-4xl pb-5 font-bold">Learn Proper Nutritions</legend>
                    <legend class="pb-5 text-gray-400 text-lg">
                        Understanding proper nutrition is key to achieving optimal health and well-being.
                        In our Learn section, we delve into the principles of balanced eating, nutrient-rich food,
                        and maitaining a healthy diet.
                    </legend>
                    <legend class="text-xs pb-5 text-gray-400">Start your journey towards a healthier lifestyle by
                        gaining
                        a deeper
                        understanding of proper nutritions. Let's make informed choices and prioritize our well-being
                        together!
                    </legend>
                    <button type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read
                        More</button>
                </div>
                <div class="col-span-1 pl-10 "><img src="{{ asset('images/home-image3.jpg') }}" alt=""
                        class="rounded-xl" style="height: 90%" width="95%">
                </div>
            </div>
        </div> --}}
    </section>

    {{-- PRICING PAGE --}}
    <section id="pricing">
        <div class=" pl-36 pr-36 pb-36 " style="background-color: #343a40">
            <legend class="text-white text-4xl pt-20 pb-5">Membership <span class="text-green-600">Pricing</span>
            </legend>
            <div class="grid grid-cols-3 ">

                <div class="col-span-1">
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <legend class="text-xs text-gray-400 font-extrabold text-center pb-2">WALK-IN SESSION</legend>
                        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            ₱65
                            <span class="text-xs text-gray-400">/annual</span>
                        </h5>
                        <hr>
                        <ul
                            class="pt-5 pb-5 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>
                                Gym racks
                            </li>
                            <li>
                                Rental gym accessories
                            </li>
                            <li>
                                Workout from 7am to 7pm
                            </li>
                            <li class="text-gray-300">
                                Free 1 drink per day
                            </li>
                            <li class="text-gray-300">
                                QR code ID
                            </li>
                            <li class="text-gray-300">
                                Gym Instructor
                            </li>
                            <li class="text-gray-300">
                                Montly Status Reports
                            </li>
                        </ul>
                        <button type="button"
                            class="w-full focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-bold rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">NOTIFY</button>
                    </div>
                </div>
                <div class="col-span-1">
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <legend class="text-xs text-gray-400 font-extrabold text-center pb-2">WALK-IN SESSION</legend>
                        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            ₱4200
                            <span class="text-sm text-gray-400">/6 months</span>
                        </h5>
                        <hr>
                        <ul
                            class="pt-5 pb-5 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>
                                Gym racks
                            </li>
                            <li>
                                Rental gym accessories
                            </li>
                            <li>
                                Workout from 7am to 7pm
                            </li>
                            <li>
                                Free 1 drink per day
                            </li>
                            <li>
                                QR code ID
                            </li>
                            <li class="text-gray-300">
                                Gym Instructor
                            </li>
                            <li class="text-gray-300">
                                Montly Status Reports
                            </li>
                        </ul>
                        <button type="button"
                            class="w-full focus:outline-none text-white bg-green-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-bold rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">BECOME
                            A MEMBER</button>
                    </div>
                </div>
                <div class="col-span-1">
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <legend class="text-xs text-gray-400 font-extrabold text-center pb-2">WALK-IN SESSION</legend>
                        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            ₱8400
                            <span class="text-sm text-gray-400">/annual</span>
                        </h5>
                        <hr>
                        <ul
                            class="pt-5 pb-5 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li>
                                Gym racks
                            </li>
                            <li>
                                Rental gym accessories
                            </li>
                            <li>
                                Workout from 7am to 7pm
                            </li>
                            <li>
                                Free 1 drink per day
                            </li>
                            <li>
                                QR code ID
                            </li>
                            <li>
                                Gym Instructor
                            </li>
                            <li>
                                Montly Status Reports
                            </li>
                        </ul>
                        <button type="button"
                            class="w-full focus:outline-none text-white bg-green-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-bold rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">BECOME
                            A MEMBER</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq">
        <div class="pl-36 pr-36 pb-36" style="background-color:#ffffff ">
            <div class="pt-20">
                <legend class="text-center  text-4xl pb-10">Frequently Asked Questions</legend>

            </div>

            <div id="accordion-collapse" data-accordion="collapse">

                @foreach ($FAQs as $index => $faq)
                    <h2 id="accordion-collapse-heading-{{$index+1}}">
                        <button type="button" 
                        @class([
                            'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3' => $index==0, 
                            'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3' => $index>0 && $index != count($FAQs)-1 ,
                            'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3' => $index == count($FAQs)-1
                        ])
                            data-accordion-target="#accordion-collapse-body-{{$index+1}}" aria-expanded="true"
                            aria-controls="accordion-collapse-body-{{$index+1}}">
                            <span>{{$faq->title}}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{$index+1}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$index+1}}">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">{{$faq->content}}</p>
                        </div>
                    </div>
                @endforeach

{{-- 
                <h2 id="accordion-collapse-heading-2">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                        aria-controls="accordion-collapse-body-2">
                        <span>What are the membership options available?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">There are 3 membership options, 1 is the
                            walk-in session, 2 is the monthly , 3 is the yearly </p>

                    </div>
                </div>
                <h2 id="accordion-collapse-heading-3">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                        aria-controls="accordion-collapse-body-3">
                        <span>Are they any age restriction to join the gym?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Similarly, you have to judge your stamina
                            before joining a gym. Most people stop their kids to join a gym at an early age as they know
                            it’s not their time to do it. The muscles of a 17-18 years man are stronger than a 13-14
                            years boy.</p>


                    </div>
                </div>
                <h2 id="accordion-collapse-heading-4">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                        aria-controls="accordion-collapse-body-3">
                        <span>What are your gym hours?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Our gym is open to 7:00 AM to 9:00 PM both
                            weekends and weekdays.</p>

                    </div>
                </div>
                <h2 id="accordion-collapse-heading-5">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                        aria-controls="accordion-collapse-body-5">
                        <span>Do you offer personal training services?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Yes, we have a different tpye of gym
                            instructor that can help anyone.</p>

                    </div>
                </div> --}}
            </div>

        </div>
    </section>

    {{-- INSTRUCTOR --}}
    <section id="instructor">
        <div class="pl-36 pr-36 pb-36" style="background-color:#dc3545 ">
            <div class="pt-20">
                <legend class="text-center text-white text-4xl pb-2">Our Instructors</legend>
                <legend class="text-center text-white text-base">Our Instructor all have 5+ years of experience as a gym instructor in the industry
                </legend>
            </div>
            <div class="grid grid-cols-4 gap-10">

                @foreach($instructors as $instructor) 
                        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">{{$instructor->first_name}} {{$instructor->last_name}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{$instructor->description}}</p>
                        </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- CONTACT PAGE --}}
    <section id="contact">
        <div class="pl-36 pr-36 pb-20 pt-20 bg-white">
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <legend class="text-center text-4xl pb-10">Contact Information</legend>

                    @foreach ($contactDetails as $contactDetail)

                        <div class="py-3">
                            <span class="font-bold">{{$contactDetail->label}}: </span><span>{{$contactDetail->content}}</span>
                        </div>
                        <hr>
                        
                    @endforeach

                </div>
                <div class="col-span-1">
                    <legend class="text-center"><a
                            href="https://www.google.com/maps/place/Jap's+Gym/@14.7396675,121.0414033,19.5z/data=!4m6!3m5!1s0x3397b04ee536f761:0x6d38876c38c72454!8m2!3d14.7396424!4d121.0414953!16s%2Fg%2F11d_8hc8_d?entry=ttu">LOCATION</a>
                    </legend>
                </div>
            </div>
        </div>
    </section>


    <div class="pt-2 pb-2" style="background-color: #212529">
        <legend class="text-white text-center">Copyright</legend>
    </div>

</body>

</html>
