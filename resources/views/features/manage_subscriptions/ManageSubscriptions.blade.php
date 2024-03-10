@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        
        <div class="flex items-start w-full justify-between ">

            <h1 class="text-2xl font-bold">Subscriptions</h1>

            <a href="{{ route('manage.subscription.create') }}" class="primary-button">
                Add Subscription +
            </a>

        </div>

        <div class="flex flex-col gap-2">

            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Subscription List</h2>
                    {{-- form actions here --}}
                    <form class="w-[30%]">
                        <input id="search" type="text" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search something">
                    </form>
                </div>

                <table class="table">
                    <thead >
                        <tr class="table-row">
                            <td class="py-2">
                                Subscription Name
                            </td>
                            <td class="py-2">
                                Price
                            </td>
                            <td class="py-2">
                                Duration
                            </td>
                            <td class="py-2">
                                Description
                            </td>
                            <td class="py-2">
                                Action
                            </td>
                        </tr>
                    </thead>
        
                    <tbody>
                        
                        @if(count($subscriptions))
                            @foreach($subscriptions as $subscription) 

                                <tr class="table-row">
                                    <td class="py-2">{{$subscription->name}}</td>
                                    <td class="py-2">{{$subscription->price}}</td>
                                    <td class="py-2">{{$subscription->number_of_months}} Month{{$subscription->number_of_months>1 ? 's' : ''}}</td>
                                    <td class="py-2">{{$subscription->description}}</td>
                                    <td>
                                        <div class="flex items-center w-full">
                                            <div class="text-left">
                                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $subscription->id }}" class="" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>
                                            </div>
    
                                            <div id="toggle{{ $subscription->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">

                                                <div class="flex flex-col gap-2 divide-y divide-light-gray-background">

                                                    <p class="text-background/70 text-sm pt-2 px-4">Actions - {{$subscription->name}}</p>

                                                    <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                        <a href="{{route('manage.subscription.edit', ['subscription' => $subscription])}}" class="py-2 px-4 hover:bg-off-white transition-all">Edit</a>
                                                        <form class="w-full py-2 px-4 hover:bg-off-white transition-all" action="{{route('manage.subscription.destroy', ['subscription' => $subscription])}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="w-full">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                    No items
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>

            @if($subscriptions->hasPages())
                <div class="card">
                    {{$subscriptions->links()}}
                </div>
            @endif

        </div>


    </div>
@endsection
