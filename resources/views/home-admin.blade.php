@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        @if (Auth::user()->user_role == '1')

        <div class="grid grid-cols-2">
            <div class="col-span-1 pl-4 pr-4">
                <div
                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                        Active Members
                    </h5>
                    <p class="text-4xl text-gray-600">{{ $active_users }}</p>

                </div>

            </div>
            <div class="col-span-1 pl-4 pr-4">
                <div
                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                        Instructors
                    </h5>
                    <p class="text-4xl text-gray-600">{{ $instructors }}</p>
                </div>
            </div>
        </div>
   

            <div class="grid grid-cols-2">
                <div class="col-span-1 pl-4 pr-4">
                    <div
                        class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Today New Members 
                        </h5>
                        <p class="text-4xl text-gray-600">{{ $payment }}</p>

                    </div>

                </div>
                <div class="col-span-1 pl-4 pr-4">
                    <div
                        class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Today Sales 
                        </h5>
                        <p class="text-4xl text-gray-600">₱{{ $payment_price }}</p>
                    </div>
                </div>
            </div>
       
                   

                        <div class="grid grid-cols-2">
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Monthly New
                                        Members
                                    </h5>
                                    <p class="text-4xl text-gray-600">{{ $payment_month }}</p>

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Monthly
                                        Sales
                                    </h5>
                                    <p class="text-4xl text-gray-600">₱{{ $payment_price_month }}</p>
                                </div>
                            </div>
                        </div>
              
               

                <div class="grid grid-cols-2 gap-9  pl-4 pr-4">

                <div class="card border border-gray-200 shadow">
                    <h2 class="font-bold">Recent Payments</h2>
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
                    <a class="outline-button mt-auto ml-auto text-xs" href="{{route('payments.index')}}">See all payments ></a>
                </div>

                <div class="card border border-gray-200 shadow">
                    <h2 class="font-bold">Equipments Status</h2>
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

                </div>

        
        @endif

    </div>
@endsection
