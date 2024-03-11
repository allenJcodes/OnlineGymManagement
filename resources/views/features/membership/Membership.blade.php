@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <h1 class="text-2xl font-bold">Membership</h1>

        <div class="flex flex-col gap-2">

            <div class="card">

                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Membership List</h2>
                    {{-- form actions here --}}
                    <form class="w-[30%]">
                        <input id="search" type="text" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search something">
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Name
                            </td>
                            <td class="py-2">
                                Start Date
                            </td>
                            <td class="py-2">
                                End Date
                            </td>
                            <td class="py-2">
                                Status
                            </td>
                            <td class="py-2">
                                Action
                            </td>
                        </tr>
                    </thead>
        
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="table-row">
                                <td class="py-2">
                                    <div class="pl-3">
                                        <p class="font-semibold">{{ $user->getFullNameAttribute() }}</p>
                                        <p class="font-normal text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </td>
                                <td class="py-2">
                                    @if ($user->membership == null)
                                        --
                                    @else
                                        {{ $user->membership->date_started }}
                                    @endif
        
                                </td>
                                <td class="py-2">
                                    @if ($user->membership == null)
                                        --
                                    @else
                                        {{ $user->membership->date_ended }}
                                    @endif
                                </td>
                                <td class="py-2">
                                    <div class="flex items-center">
                                        @if ($user->membership == null)
                                            Unsubscribed
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                            @if ($user->membership->date_ended == now()->format('Y-m-d'))
                                                Subscription Expired
                                            @else
                                                Subscribed
                                            @endif
                                        @endif
        
        
                                    </div>
                                </td>
                                <td>
                                    @if ($user->membership == null)
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal{{ $user->id }}" class="primary-button"
                                            type="button">
                                            Subscribe
                                        </button>
                                    @else
                                        <button data-modal-target="popup-modal2" data-modal-toggle="popup-modal2{{ $user->id }}"
                                            class="block text-white bg-red-700 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Unsubscribe
                                        </button>
                                    @endif

                                    {{-- subscribe modal --}}
                                    <div id="popup-modal{{ $user->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal">
        
                                                    <span class="sr-only">Close modal</span>
                                                </button>
        
                                                <div class="p-6 text-center">
                                                    <div class="flex justify-center "> <img src="{{ asset('images/logo.png') }}" alt="" width="250" height="250"></div>
                                                    <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white pt-10 flex justify-center">Name: {{ $user->name }}</h4>
        
        
                                                        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white"> Subscription Details:</h3>
                                                        <form id="subscription-form" action="{{route('membership.store')}}" method="POST" class="grid w-full gap-6 md:grid-cols-2">
                                                            @csrf
                                                            @foreach ($subscriptions as $subscription)
                                                                
                                                                <div class="flex justify-center items-center space-x-4">
                                                                    <input type="radio" id="membership-{{$subscription->id}}" name="subscription" value="{{$subscription->id}}" class=" peer" required>
                                                                    <label for="membership-{{$subscription->id}}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                                        <div class="block">
                                                                            <div class="w-full text-lg font-semibold">{{$subscription->number_of_months}} Month{{$subscription->number_of_months>1 ? 's' : ''}}
                                                                            </div>
                                                                            <div class="w-full">P{{$subscription->price}}</div>
                                                                            <div class="w-full">{{$subscription->description}}</div>
                                                                        </div>
                                                                        <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 14 10">
                                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </form>
        
        
                                                    </h3>
                                                    <button form="subscription-form" data-modal-hide="popup-modal" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mt-10">
                                                        Submit
                                                    </button>
                                                    <button data-modal-hide="popup-modal{{ $user->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    {{-- Unsubscribe modal --}}
                                    <div id="popup-modal2{{ $user->id }}" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal">
        
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
        
                                                    <div class="flex justify-center "> <img src="{{ asset('images/logo.png') }}"
                                                            alt="" width="250" height="250"></div>
                                                    <h3
                                                        class="mb-5 text-lg font-medium text-gray-900 dark:text-white pt-10 flex justify-center">
                                                        Name: {{ $user->name }}</h4>
        
        
                                                        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">
                                                            Subscription
                                                            Details:</h3>
                                                        <ul class="grid w-full gap-6 md:grid-cols-2">
                                                            <li class="flex justify-center items-center space-x-4">
                                                                <input type="radio" id="hosting-small"
                                                                    name="membership{{ $user->id }}" value="6 months"
                                                                    class=" peer" required>
                                                                <label for="hosting-small"
                                                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                                    <div class="block">
                                                                        <div class="w-full text-lg font-semibold">0-6 Months
                                                                        </div>
                                                                        <div class="w-full">P4200</div>
                                                                        <div class="w-full">zzzzz</div>
                                                                    </div>
                                                                    <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 14 10">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                                    </svg>
                                                                </label>
                                                            </li>
                                                            <li class="flex justify-center items-center space-x-4">
                                                                <input type="radio" id="hosting-big"
                                                                    name="membership{{ $user->id }}" value="12 months"
                                                                    class=" peer">
                                                                <label for="hosting-big"
                                                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                                    <div class="block">
                                                                        <div class="w-full text-lg font-semibold">6-12
                                                                            Months</div>
                                                                        <div class="w-full">P8400</div>
                                                                        <div class="w-full">Good for REGULARS</div>
                                                                    </div>
                                                                    <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 14 10">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                                    </svg>
                                                                </label>
                                                            </li>
                                                        </ul>
        
        
                                                    </h3>
                                                    <button data-modal-hide="popup-modal2{{ $user->id }}" type="button"
                                                        id="submitMembership{{ $user->id }}"
                                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mt-10">
                                                        Submit
                                                    </button>
                                                    <button data-modal-hide="popup-modal2{{ $user->id }}" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                No Members
                            </td>
                        </tr>

                        @endforelse
        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
