@extends('layouts.app')

@section('content')


    <div class="flex flex-col pt-16 gap-5 text-background">


        @if (Auth::user()->user_role == '3')
            <div class="flex gap-3">

                <div class="card h-fit">
                    <div class="flex min-h-24 min-w-24 bg-dashboard-accent-base aspect-square rounded-full"></div>
                    <p class="whitespace-nowrap">{{$user->full_name}}</p>
                    <p class="whitespace-nowrap">{{$user->email}}</p>
                    <p class="whitespace-nowrap">{{$user->role->role_name}}</p>
                </div>

                <div class="grid grid-cols-2 gap-3 w-full">
                    <div class="card">
                        <div class="flex w-full justify-between">
                            <h2>Subscription Status</h2>
                            @if (count($user->subscriptions) == 0)
                                Unsubscribed
                            @else
                                <div class="flex items-center gap-2 text-sm">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400"></div>
                                    @if ($user->subscriptions[0]->end_date == now()->format('Y-m-d'))
                                        Subscription Expired
                                    @else
                                        Subscribed
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
                                
                            <div class="flex flex-col">
                                <p class="text-sm text-dark-gray-800">Next due date</p>
                                <p class="font-medium">{{$dueDate}}</p>
                            </div>
                        @endif
                    </div>

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
                                        <td class="py-2">{{$recentPayment->mode_of_payment}}</td>
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
                        <a class="outline-button mt-auto ml-auto text-xs" href="{{route('payments')}}">See all payments ></a>
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
        @endif

        @if (Auth::user()->user_role == '1')
            <div class="pl-10 pr-10 pt-5">

                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <legend class="text-center pb-5 text-xl">Daily</legend>
                        <div class="grid grid-cols-2">
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Customer
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">{{ $payment }}</p> --}}

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">₱{{ $payment_price }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <legend class="text-center pb-5 text-xl">Monthly</legend>
                        <div class="grid grid-cols-2">
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Customer
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">{{ $payment_month }}</p> --}}

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">₱{{ $payment_price_month }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif

        @if (Auth::user()->user_role == '2')
            <div class="pl-10 pr-10 pt-5">

                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <legend class="text-center pb-5 text-xl">Daily</legend>
                        <div class="grid grid-cols-2">
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Customer
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">{{ $payment }}</p> --}}

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">₱{{ $payment_price }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <legend class="text-center pb-5 text-xl">Monthly</legend>
                        <div class="grid grid-cols-2">
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Customer
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">{{ $payment_month }}</p> --}}

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    {{-- <p class="text-4xl text-gray-600">₱{{ $payment_price_month }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection
