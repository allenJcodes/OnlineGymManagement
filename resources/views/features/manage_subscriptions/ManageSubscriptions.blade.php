@extends('layouts.app')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20" style="max-height: 85vh">
        <a href="{{ route('manage.subscription.create') }}">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Subscription</button>
        </a>
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="height: 20vh">
            <thead
                class="text-xs text-white uppercase  dark:bg-gray-700 dark:text-gray-400"style="background-color: #0F172A">

                <th scope="col" class="px-6 py-3">
                    Subscription Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Duration
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                </tr>
            </thead>

            <tbody>

                @foreach($subscriptions as $subscription) 

                <tr >

                    <td scope="col" class="px-6 py-3">{{$subscription->name}}</td>
                    <td scope="col" class="px-6 py-3">{{$subscription->price}}</td>
                    <td scope="col" class="px-6 py-3">{{$subscription->number_of_months}} Month{{$subscription->number_of_months>1 ? 's' : ''}}</td>
                    <td scope="col" class="px-6 py-3">{{$subscription->description}}</td>
                    <td>
                        <div class="text-right pr-5"style="">
                            <button id="dropdownButton" data-dropdown-toggle="toggle{{ $subscription->id }}"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                        </div>
                        <div id="toggle{{ $subscription->id }}"
                            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">

                                <li>
                                    <a href="{{route('manage.subscription.edit', ['subscription' => $subscription])}}"
                                        class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>

                                {{-- di pa nagana --}}
                                <li>
                                    <form class="w-full" action="{{route('manage.subscription.destroy', ['subscription' => $subscription])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                    </form>


                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
