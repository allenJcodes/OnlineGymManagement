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
    <!-- Styles -->
    {{-- <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style> --}}

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
                                <a href="/"
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
                                        class="text-black bg-yellow-400 p-2 rounded-xl hover:bg-gray-400">Login</span></a>
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
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline
                            process on how to certify for your weekly benefits:</p>
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
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline
                            process on how to certify for your weekly benefits:</p>
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
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline
                            process on how to certify for your weekly benefits:</p>
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
        <div class="bg-white pl-36 pr-36">
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
        </div>
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


    {{-- INSTRUCTOR --}}
    <section id="instructor">
        <div class="pl-36 pr-36 pb-36" style="background-color:#dc3545 ">
            <div class="pt-20">
                <legend class="text-center text-white text-4xl pb-2">Our Instructors</legend>
                <legend class="text-center text-white text-base">Our Instructor all have 5+ years of experience as a
                    gym
                    instructor in the industry
                </legend>
            </div>
            <div class="grid grid-cols-4 pt-16">
                <div class="col-span-1 pl-3 pr-3">
                    <div
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                            Mark</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
                <div class="col-span-1 pl-3 pr-3">
                    <div
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                            Jose</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
                <div class="col-span-1 pl-3 pr-3">
                    <div
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                            Joseph</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
                <div class="col-span-1 pl-3 pr-3">
                    <div
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                            Carding</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- CONTACT PAGE --}}
    <section id="contact">
        <div class="pl-36 pr-36 pb-20 pt-20 bg-white">
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <legend class="text-center text-4xl pb-10">Contact Information</legend>
                    <div class="pb-2">
                        <span class="font-bold">Main Location: </span><span>Olympus Road Athena St. in Phase 3 of North
                            Olympus
                            Subdivision, Quezon
                            City</span>

                    </div>
                    <hr>
                    <div class="pb-2 pt-2">
                        <span class="font-bold">Gym Phone: </span><span>123 123 123
                        </span>
                    </div>
                    <hr>
                    <div class="pb-2 pt-2">
                        <span class="font-bold">Owners's contact number: </span><span>555 555 555</span>
                    </div>
                    <hr>
                    <div class="pb-2 pt-2">
                        <span class="font-bold">Email: </span><span>sample@gmail.com</span>
                    </div>
                    <hr>

                </div>
                <div class="col-span-1">
                    <legend class="text-center">MAP</legend>
                </div>
            </div>
        </div>
    </section>


    <div class="pt-2 pb-2" style="background-color: #212529">
        <legend class="text-white text-center">Copyright</legend>
    </div>

</body>

</html>
