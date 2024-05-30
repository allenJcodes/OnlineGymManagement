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
    <script src="{{ asset('js/app.js') }}" defer></script>


    {{-- FLOWBITE --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</head>

<body class="font-red-hat-display bg-background">

    <nav class="bg-background fixed w-full z-20 top-0 left-0 py-2 h-16 flex items-center justify-center 2xl:px-64">
        <div class="w-full flex items-center justify-between">
            <a href="/" class="flex items-center flex-row gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="" width="50" height="50">
                <p class="text-white font-bold">JAPS FITNESS</p>
            </a>
            <div class="flex items-center">
                @if (Route::has('login'))
                        <ul class="flex font-medium items-center">
                            <li>
                                <a href="#session" class="block py-2 px-4 rounded-md text-white hover:text-yellow-300" aria-current="page">
                                    Session
                                </a>
                            </li>
                            <li>
                                <a href="#pricing" class="block py-2 px-4 rounded-md text-white hover:text-yellow-300" aria-current="page">
                                    Pricing
                                </a>
                            </li>
                            <li>
                                <a href="#learn" class="block py-2 px-4 rounded-md text-white hover:text-yellow-300" aria-current="page">
                                    Learn
                                </a>
                            </li>
                            <li>
                                <a href="#faq" class="block py-2 px-4 rounded-md text-white hover:text-yellow-300" aria-current="page">
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="#instructor" class="block py-2 px-4 rounded-md text-white hover:text-yellow-300" aria-current="page">
                                    Instructors
                                </a>
                            </li>
                            <li>
                                <a href="#contact" class="block py-2 px-4 rounded-md text-white hover:text-yellow-300" aria-current="page">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="block py-2 px-4 text-black bg-yellow-400 p-2 rounded-xl hover:bg-gray-400 whitespace-nowrap">
                                    {{auth()->check() ? 'My Dashboard' : 'Login'}}
                                </a>
                            </li>
                        </ul>
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
    <div class="flex items-center gap-32 pt-16 pb-0 h-[90vh] relative px-16 2xl:px-64 text-justify">
        <div class="z-10 w-3/4" >
            <h1 class="text-6xl pb-5 text-white font-bold"> Become <span class="text-yellow-300">Physically Fit</span></h1>

            <p class="text-white/80 text-lg pb-5">
                Welcome to Japs Fitness Gym, an online fitness advocacy dedicated to empowering students to lead healthy and active lifestyle. We understand the imporatnce of phusical well-being in achieving academic success and overall personal growth. Through our virtual platform, we aim to inspire, educate, and support students in their fitness journey, helping them become the best versions of themselves. Join us we embark on a transformative fitness adventure together!
            </p>

            <a href="{{ route('register') }}">
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-lg">Register</button>
            </a>
        </div>

        <div class="absolute flex items-center right-0 bottom-0 justify-center w-full" >
            <img  class="aspect-video w-full" src="{{ asset('images/home-image.jpg') }}" alt="">
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-background/70"></div>
    </div>


    {{-- SESSION PAGE --}}
    <section id="session">
        <div class="py-20 gap-10 bg-off-white flex flex-col items-center justify-center px-16 2xl:px-64 ">

            <h2 class="text-5xl text-background">Gym Sessions</h2>

            <div class="grid grid-cols-3 gap-10">

                @foreach ($gym_sessions as $index => $gym_session)
                    <x-gym-session-card 
                    title="{{ucwords($gym_session->title)}}" 
                    content="{{$gym_session->content}}"
                    >

                        @slot('icon')
                            @switch($index)
                                @case(0)
                                    <box-icon name='laptop' class="fill-accent size-10" ></box-icon>
                                    @break

                                @case(1)
                                    <box-icon name='user-pin'  class="fill-accent size-10" ></box-icon>
                                    @break
                                
                                @case(2)
                                    <box-icon name='group' class="fill-accent size-10" ></box-icon>
                                    @break
                            
                                @default
                                    <box-icon name='dumbbell' class="fill-accent size-10" ></box-icon>
                                    
                            @endswitch

                            {{-- <svg class="min-w-7 min-h-7 text-accent mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                            </svg> --}}
                        @endslot

                    </x-gym-session-card>
                @endforeach

            </div>

        </div>
    </section>

    {{-- LEARN PAGE --}}
    <section id="learn">
        <div class="py-20 gap-16 bg-off-white flex flex-col items-center justify-center px-16 2xl:px-64 ">
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
        <div class="py-20 gap-10 bg-background flex flex-col items-center justify-center text-white px-16 2xl:px-64">
            <h2 class="text-5xl">Membership Pricing</h2>

            <div class="grid grid-cols-3 gap-10 w-full">
                
                @foreach ($membershipPricings as $index => $membershipPricing)
                    <x-membership-pricing-card 
                        type="{{$membershipPricing->name}}" 
                        price="{{$membershipPricing->price}}" 
                        description="{{$membershipPricing->description}}"
                        :inclusions="$membershipPricing->inclusions" 
                        :bestOffer="$membershipPricing->best_option"
                    />
                    
                @endforeach

            </div>
        </div>
    </section>

    {{-- INSTRUCTOR --}}
    <section id="instructor">
        <div class="py-20 gap-10 bg-off-white flex flex-col items-center justify-center px-16 2xl:px-64">

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
        <div class="py-20 gap-10 bg-off-white flex flex-col items-center justify-center px-16 2xl:px-64">
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
                            <box-icon data-accordion-icon name='chevron-down' class="size-5 fill-gray-600"></box-icon>
                            {{-- <svg data-accordion-icon class="w-3 h-3 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg> --}}
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{$index+1}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$index+1}}">
                        <div class="p-5 border border-b-0 border-gray-200">
                            <p class="text-gray-500 dark:text-gray-400">{{$faq->content}}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    {{-- CONTACT PAGE --}}
    <section id="contact">
        <div class="py-20 bg-off-white px-16 2xl:px-64">
            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <legend class="text-center text-4xl pb-10">Contact Information</legend>

                    @foreach ($contactDetails as $contactDetail)
                        @if ($contactDetail->label !== 'Coordinates')
                            <div class="py-3">
                                <span class="font-bold">{{ $contactDetail->label }}:
                                </span><span>{{ $contactDetail->content }}</span>
                            </div>
                            <hr>
                        @endif
                    @endforeach

                </div>
                <div class="col-span-1">
                    <iframe class="max-w-full" src="https://www.google.com/maps?q={{ $coordinates->content }}&z=18&output=embed"
                        width="600" height="300" style="border:0; padding-left: 2rem" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>



    <div class="flex flex-col py-6 gap-4 items-center text-off-white fill-off-white">
        <div class="flex flex-col gap-2 items-center">

            {{-- <box-icon name='facebook-circle' type='logo' ></box-icon> --}}
            <a target="_blank" href="https://www.facebook.com/japsgymolympus" class="flex items-center gap-2">
                <div class="flex items-center justify-center p-0.5 bg-[#1877F2] rounded-md">
                    <box-icon class="size-5 fill-white" type='logo' name='facebook'></box-icon>
                </div>
                Japs Gym Olympus
            </a>
     
        </div>

        <p>©2024 Japs Fitness Gym. All rights reserved.</p>
    </div>

</body>

</html>
