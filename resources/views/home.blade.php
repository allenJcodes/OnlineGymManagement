@extends('layouts.app')

@section('content')


    <div class="containter pt-14">


        @if (Auth::user()->user_role == '3')
            <legend class="text-5xl text-center pb-10 pt-5">Welcome, {{ Auth::user()->name }}</legend>


            <div class="col-span-1 pl-5 pr-5 flex justify-center items-center">
                <div
                    class=" text-center block max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Membership Status</h5>
                    @if (is_null($membership))
                        <p class="font-normal text-gray-700 dark:text-gray-400">

                        <div class="flex justify-center items-center">
                            <span class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2">
                            </span>
                            <span class="text-2xl">
                                No Subscription Yet
                            </span>
                        </div>

                        </p>
                    @else
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                        <div class="flex justify-center items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                            <div class="text-2xl">
                                Subscribed
                            </div>
                        </div>

                        <div class="text-base text-gray-400">{{ $membership->date_started }} to
                            {{ $membership->date_ended }}
                        </div>


                        </p>
                    @endif
                </div>
            </div>
        @endif

        {{-- <div
            class=" text-center block max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Membership Status</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
        </div> --}}
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
                                    <p class="text-4xl text-gray-600">{{ $payment }}</p>

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    <p class="text-4xl text-gray-600">₱{{ $payment_price }}</p>
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
                                    <p class="text-4xl text-gray-600">{{ $payment_month }}</p>

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    <p class="text-4xl text-gray-600">₱{{ $payment_price_month }}</p>
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
                                    <p class="text-4xl text-gray-600">{{ $payment }}</p>

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    <p class="text-4xl text-gray-600">₱{{ $payment_price }}</p>
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
                                    <p class="text-4xl text-gray-600">{{ $payment_month }}</p>

                                </div>

                            </div>
                            <div class="col-span-1 pl-4 pr-4">
                                <div
                                    class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total
                                        Sales
                                    </h5>
                                    <p class="text-4xl text-gray-600">₱{{ $payment_price_month }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection
