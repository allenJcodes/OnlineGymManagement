@extends('layouts.app')

@section('content')
    <div class="containter pt-14">
        <legend class="text-5xl text-center pb-10 pt-5">Welcome</legend>
        {{-- <div class="grid grid-cols-2 ">
            <div class="col-span-1 pl-5 pr-5 flex justify-center items-center">
                <div
                    class=" text-center block max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Membership Status</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </div>
            <div class="col-span-1 pl-5 pr-5 flex justify-center items-center">
                <div
                    class=" text-center block max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Membership Status</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </div>

        </div> --}}
        <div class="pl-10 pr-10 pt-5">
            <div
                class="w-full text-center block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Membership Status</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    @if ($membership->date_ended === null)
                        <div class="flex justify-center items-center">
                            <span class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2">
                            </span>
                            <span class="text-2xl">
                                No Subscription Yet
                            </span>
                        </div>
                    @else
                        <div class="flex justify-center items-center">
                            <span class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2">
                            </span>
                            <span class="text-2xl">
                                {{ $membership->date_ended }}
                            </span>

                        </div>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
