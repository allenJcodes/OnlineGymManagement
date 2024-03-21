@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-2 text-background">
        @if (Auth::user()->user_role == '1')
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">

                <div class="col-span-2 lg:col-span-3 card flex-row min-w-[20rem] items-center bg-gradient-to-r from-background via-background to-background/90 relative overflow-clip text-off-white">
                    
                    <div class="flex items-center justify-center h-28 w-28 bg-dashboard-accent-base aspect-square rounded-full overflow-clip">
                        @if(auth()->user()->profile_image)
                            <img src="{{ asset('/images/user/' . auth()->user()->profile_image) }}" alt="Profile Image" class="object-cover w-full">
                        @else
                            <box-icon class="h-20 w-20 fill-white" type="solid" name='user' ></box-icon>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        <p class="whitespace-nowrap font-bold text-2xl text-dashboard-accent-base">{{auth()->user()->full_name}} </p>
                        <p class="whitespace-nowrap text-sm text-dashboard-background/70">{{auth()->user()->email}}</p>
                        <p class="whitespace-nowrap text-sm text-dashboard-background/70">{{auth()->user()->role->role_name}}</p>
                    </div>

                    <img class="absolute top-6 right-0 w-[18rem] opacity-50" src="{{ asset('images/home-image.png') }}" alt="">
                </div>

                <div class="card">
                    <h2>
                        Total Active Members
                    </h2>
                    <hr>
                    <p class="text-4xl text-gray-500">{{ $active_users }}</p>
                </div>

                <div class="card">
                    <h2>
                        Total Instructors
                    </h2>
                    <hr>
                    <p class="text-4xl text-gray-500">{{ $instructors }}</p>
                </div>

                <div class="card">
                    <h2>
                        Today New Members
                    </h2>
                    <hr>
                    <p class="text-4xl text-gray-500">{{ $payment }}</p>
                </div>
                <div class="card">
                    <h2>
                        Today Sales
                    </h2>
                    <hr>
                    <p class="text-4xl text-gray-500">₱{{ $payment_price }}</p>
                </div>
                <div class="card">
                    <h2>
                        Monthly New Members
                    </h2>
                    <hr>
                    <p class="text-4xl text-gray-500">{{ $payment_month }}</p>
                </div>
                <div class="card">
                    <h2>
                        Monthly Sales
                    </h2>
                    <hr>
                    <p class="text-4xl text-gray-500">₱{{ $payment_price_month }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 px-1">
                <div class="card border border-gray-200 shadow">
                    <h2 class="font-bold">Recent Memberships</h2>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr class="table-row">
                                <td class="py-2">Date</td>
                                <td class="py-2">Name</td>
                                <td class="py-2">Subscription</td>
                                <td class="py-2">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                                <tr class="table-row">
                                    <td class="py-2">{{ $subscriber->created_at->format('F d, Y') }}</td>
                                    <td class="py-2">{{ $subscriber->user->full_name }}</td>
                                    <td class="py-2">{{ $subscriber->subscriptionTypes->name }}</td>
                                    <td class="py-2 pl-4">
                                        @if ($subscriber->status != 2)
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                        @elseif($subscriber->end_date <= now()->format('Y-m-d'))
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                        No items
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a class="outline-button mt-auto ml-auto text-xs" href="{{ route('membership.index') }}">See all
                        memberships
                        ></a>
                </div>

                <div class="card border border-gray-200 shadow">
                    <h2 class="font-bold">Equipments Status</h2>
                    <hr>
                    <div class="form-field-container">
                        <p class="form-label">Available</p>
                        <p class="text-base font-medium">{{ count($availableEquipments) }}</p>
                    </div>

                    <div class="form-field-container">
                        <p class="form-label">Unavailable</p>
                        <p class="text-base font-medium">{{ count($notAvailableEquipments) }}</p>
                    </div>

                    <div class="form-field-container">
                        <p class="form-label">Under Maintenance</p>
                        <p class="text-base font-medium">{{ count($underMaintenanceEquipments) }}</p>
                    </div>

                    <a class="outline-button mt-auto ml-auto text-xs" href="{{ route('equipment.index') }}">See all
                        equipments ></a>

                </div>

            </div>
        @endif

    </div>
@endsection
