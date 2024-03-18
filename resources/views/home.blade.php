@extends('layouts.app')

@section('content')


    <div class="flex flex-col pt-16 gap-5 text-background">
            <div class="flex flex-col gap-3">

                <div class="card flex-row min-w-[20rem] items-center bg-gradient-to-r from-background via-background to-background/90 relative overflow-clip text-off-white">
                    
                    <div class="flex items-center justify-center h-28 w-28 bg-dashboard-accent-base aspect-square rounded-full overflow-clip">
                        @if(auth()->user()->profile_image)
                            <img src="{{ asset('/images/user/' . auth()->user()->profile_image) }}" alt="Profile Image" class="object-cover w-full">
                        @else
                            <box-icon class="h-20 w-20 fill-white" type="solid" name='user' ></box-icon>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        <p class="whitespace-nowrap font-bold text-2xl text-dashboard-accent-base">{{$user->full_name}} </p>
                        <p class="whitespace-nowrap text-sm text-dashboard-background/70">{{$user->email}}</p>
                        <p class="whitespace-nowrap text-sm text-dashboard-background/70">{{$user->role->role_name}}</p>
                    </div>

                    <img class="absolute top-6 right-0 w-[18rem] opacity-50" src="{{ asset('images/home-image.png') }}" alt="">
                </div>

                <div class="grid grid-cols-2 gap-3 w-full">

                    @if(auth()->user()->user_role == 3)
                        <div class="card">
                            <div class="flex w-full justify-between">
                                <h2>Subscription Status</h2>
                                @if (count($user->subscriptions) == 0)
                                    Unsubscribed
                                @else
                                    <div class="flex items-center gap-2 text-sm">

                                        @if ($user->subscriptions[0]->endingSoon())
                                            <div class="py-1 px-3 text-sm bg-orange-100 ring-1 ring-orange-500 text-orange-500 rounded-full">Subscription ending soon</div>
                                        @elseif ($user->subscriptions[0]->end_date < now()->format('Y-m-d'))
                                            <div class="py-1 px-3 text-sm bg-red-100 ring-1 ring-red-500 text-red-500 rounded-full">Subscription ended</div>
                                        @else
                                            <div class="py-1 px-3 text-sm bg-green-100 ring-1 ring-green-500 text-green-500 rounded-full">Subscribed</div>
                                        @endif
                                    </div>
                                @endif

                            </div>

                            <hr>

                            @if (count($user->subscriptions) != 0)
                                @php
                                    $oneMonthFromNow = now()->addMonth();
                                    $dueDate = $oneMonthFromNow > $user->subscriptions[0]->end_date ? $user->subscriptions[0]->end_date->format('F d, Y') : $oneMonthFromNow->format('F d, Y');
                                @endphp

                                <div class="flex flex-col gap-3">

                                    <div class="form-field-container gap-0">
                                        <p class="form-label">Type</p>
                                        <p class="font-medium">{{$user->subscriptions[0]->subscriptionTypes->name}}</p>
                                    </div>

                                    <div class="form-field-container gap-0">
                                        <p class="form-label">Amount</p>
                                        <p class="font-medium">{{$user->subscriptions[0]->subscriptionTypes->price}}</p>
                                    </div>
                                </div>
                                    
                                <div class="form-field-container gap-0">
                                    <p class="form-label">Next due date</p>
                                    <p class="font-medium">{{$dueDate}}</p>
                                </div>

                                <a class="outline-button mt-auto ml-auto text-xs" href="{{route('subscription.index')}}">See all subscriptions ></a>
                            @endif
                        </div>
                    @endif

                    <div class="card">
                        <h2>Recent Payments</h2>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr class="table-row">
                                    <td class="py-2">Date</td>
                                    <td class="py-2">Mode of Payment</td>
                                    <td class="py-2">Amount Paid</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentPayments as $recentPayment)
                                    <tr class="table-row">
                                        <td class="py-2">{{$recentPayment->created_at->format('F d, Y')}}</td>
                                        <td class="py-2">{{ucfirst($recentPayment->mode_of_payment)}}</td>
                                        <td class="py-2">P {{$recentPayment->amount_paid}}</td>                                        
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
                        <a class="outline-button mt-auto ml-auto text-xs" href="{{route('payments.index')}}">See all payments ></a>
                    </div>

                    <div class="card">
                        <h2>Equipments Status</h2>
                        <hr>
                        <div class="form-field-container">
                            <p class="form-label">Available</p>
                            <p class="text-base font-medium">{{count($availableEquipments)}}</p>
                        </div>

                        <div class="form-field-container">
                            <p class="form-label">Unavailable</p>
                            <p class="text-base font-medium">{{count($notAvailableEquipments)}}</p>
                        </div>

                        <div class="form-field-container">
                            <p class="form-label">Under Maintenance</p>
                            <p class="text-base font-medium">{{count($underMaintenanceEquipments)}}</p>
                        </div>

                        <a class="outline-button mt-auto ml-auto text-xs" href="{{route('equipment.index')}}">See all Equipments ></a>

                    </div>

                    <div class="card">
                        <div class="flex flex-col">
                            <h2>Classes for this week </h2>
                            <p class="text-xs text-dark-gray-800">({{now()->startOfWeek()->format('M d')}} - {{now()->endOfWeek()->format('M d')}})</p>
                        </div>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr class="table-row">
                                    <td class="py-2">Date</td>
                                    <td class="py-2">Class Name</td>
                                    <td class="py-2">Instructor</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedulesThisWeek as $schedule)
                                    <tr class="table-row">
                                        <td class="py-2">{{$schedule->created_at->format('F d, Y')}}</td>
                                        <td class="py-2">{{$schedule->class_name}}</td>
                                        <td class="py-2">P {{$schedule->instructor->user->full_name}}</td>                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                            No classes this week!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <a class="outline-button mt-auto ml-auto text-xs" href="{{route('scheduling.index')}}">See all Classes ></a>

                    </div>

                </div>

            </div>
        
    </div>
@endsection
