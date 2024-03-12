<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title style="color: white">Japs Fitness Gym</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- FLOWBITE --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</head>

<body class="font-red-hat-display bg-background">

    <nav class="bg-background fixed w-full z-20 top-0 left-0 h-16 flex items-center justify-center px-64">
        <div class="w-full flex items-center justify-between">
            <a href="/" class="flex items-center">

                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><img
                        src="{{ asset('images/logo.png') }}" alt="" width="50" height="50"></span>
            </a>
            <div class="flex md:order-2 items-center">
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

    {{-- HERO --}}
    <div class="flex items-center px-64 gap-32 pt-16 pb-0 h-[90vh] relative">
        <div class="z-10 w-3/4" >
            <h1 class="text-6xl pb-5 text-white font-bold"> Become <span class="text-yellow-300">Physically Fit</span></h1>

            <p class="text-white/80 text-lg pb-5">
                Welcome to Japs Fitness Gym, an online fitness advocacy dedicated to empowering students to lead healthy and active lifestyle. We understand the imporatnce of phusical well-being in achieving academic success and overall personal growth. Through our virtual platform, we aim to inspire, educate, and support students in their fitness journey, helping them become the best versions of themselves. Join us we embark on a transformative fitness adventure together!
            </p>

            <a href="{{ route('register') }}">
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-lg">Register</button>
            </a>
        </div>

        <div class="absolute right-0 bottom-0 flex-1 h-fit self-end justify-self-end" >
            <img src="{{ asset('images/home-image.png') }}" alt="">
        </div>
    </div>


    {{-- SESSION PAGE --}}
    <section id="session">
        <div class="py-20 px-64 gap-10 bg-off-white flex flex-col items-center justify-center">

            <h2 class="text-5xl text-background">Gym Sessions</h2>

            <div class="grid grid-cols-3 gap-10">

                @foreach ($gym_sessions as $gym_session)
                    <x-gym-session-card 
                    title="{{$gym_session->title}}" 
                    content="{{$gym_session->content}}"
                    >

                        @slot('icon')
                            <svg class="min-w-7 min-h-7 text-accent mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                            </svg>
                        @endslot

                    </x-gym-session-card>
                @endforeach

            </div>

        </div>
    </section>

    {{-- LEARN PAGE --}}
    <section id="learn">
        <div class="py-20 px-64 gap-8 bg-off-white flex flex-col items-center justify-center">
            @foreach ($learnContent as $index => $learn_content)

                <x-learn-content 
                    title="{{$learn_content->title}}" 
                    subtitle="{{$learn_content->subtitle}}"
                    content="{{$learn_content->content}}"
                    image="{{$learn_content->image}}"
                    :flipped="($index+1) % 2 == 0"
                />

            @endforeach
        </div>
    </section>

    {{-- PRICING PAGE --}}
    <section id="pricing">
        <div class="py-20 px-64 gap-10 bg-background flex flex-col items-center justify-center text-off-white">
            <h2 class="text-5xl">Membership Pricing</h2>

            <div class="grid grid-cols-3 gap-10 w-full">
                
                @foreach ($membershipPricings as $index => $membershipPricing)
                    <x-membership-pricing-card 
                        type="{{$membershipPricing->name}}" 
                        price="{{$membershipPricing->price}}" 
                        :inclusions="$membershipPricing->inclusions" 
                        :bestOffer="($index == count($membershipPricings)-1)"
                    />
                    
                @endforeach

            </div>
        </div>
    </section>

    {{-- INSTRUCTOR --}}
    <section id="instructor">
        <div class="py-20 px-64 gap-10 bg-off-white flex flex-col items-center justify-center">

            <h2 class="text-5xl text-background">Our Instructors</h2>

            <div class="grid grid-cols-3 gap-10">

                @foreach ($instructors as $instructor)
                    <x-instructor-card
                        name="{{$instructor->user->first_name}} {{$instructor->user->last_name}}"
                        description="{{$instructor->description}}"
                    />
                @endforeach

            </div>

        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq">
        <div class="py-20 px-64 gap-10 bg-off-white flex flex-col items-center justify-center">
            <h2 class="text-5xl text-background">Frequently Asked Questions</h2>

            <div class="w-full" id="accordion-collapse" data-accordion="collapse">

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

            </div>

        </div>
    </section>


    {{-- CONTACT PAGE --}}
    <section id="contact">
        <div class="pl-36 pr-36 pb-20 pt-20 bg-off-white">
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d964.6301823017375!2d121.0414033!3d14.7396675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b04ee536f761%3A0x6d38876c38c72454!2sJap&#39;s%20Gym!5e0!3m2!1sen!2sph!4v1709828678153!5m2!1sen!2sph" width="600" height="300" style="border:0; padding-left: 2rem" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <div class="pt-2 pb-2" style="background-color: #212529">
        <legend class="text-white text-center">Copyright</legend>
    </div>

</body>

</html>
