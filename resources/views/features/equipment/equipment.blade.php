@extends('layouts.app')

@section('content')
    <div class="containter pt-14">
        <div class="flex justify-end pr-4">
            <a href="{{ route('AddEquipment') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Equipment</button>
            </a>
        </div>
        <div class="grid grid-rows-2">
            <div class="row-span-1">
                <div class="grid grid-cols-3">
                    <div class="col-span-1">

                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <div class="flex justify-center items-center">
                                    <img class="rounded-t-lg " src="{{ asset('images/home-image.png') }}" alt=""
                                        width="300" height="300" />
                                </div>
                            </a>
                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 85%"> 85%</div>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Here are the
                                    biggest enterprise
                                    technology acquisitions of 2021 so far, in reverse chronological order.</p>

                            </div>
                        </div>

                    </div>
                    <div class="col-span-1">

                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <div class="flex justify-center items-center">
                                    <img class="rounded-t-lg " src="{{ asset('images/home-image.png') }}" alt=""
                                        width="300" height="300" />
                                </div>
                            </a>
                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 55%"> 55%</div>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Here are the
                                    biggest enterprise
                                    technology acquisitions of 2021 so far, in reverse chronological order.</p>

                            </div>
                        </div>

                    </div>
                    <div class="col-span-1">

                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <div class="flex justify-center items-center">
                                    <img class="rounded-t-lg " src="{{ asset('images/home-image.png') }}" alt=""
                                        width="300" height="300" />
                                </div>
                            </a>
                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 25%"> 25%</div>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Here are the
                                    biggest enterprise
                                    technology acquisitions of 2021 so far, in reverse chronological order.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row-span-1 pt-5 ">
                <div class="grid grid-cols-3">
                    <div class="col-span-1">

                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <div class="flex justify-center items-center">
                                    <img class="rounded-t-lg " src="{{ asset('images/home-image.png') }}" alt=""
                                        width="300" height="300" />
                                </div>
                            </a>
                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 42%"> 42%</div>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Here are the
                                    biggest enterprise
                                    technology acquisitions of 2021 so far, in reverse chronological order.</p>

                            </div>
                        </div>

                    </div>
                    <div class="col-span-1">

                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <div class="flex justify-center items-center">
                                    <img class="rounded-t-lg " src="{{ asset('images/home-image.png') }}" alt=""
                                        width="300" height="300" />
                                </div>
                            </a>
                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 60%"> 60%</div>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
                                    enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                            </div>
                        </div>

                    </div>
                    <div class="col-span-1">

                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <div class="flex justify-center items-center">
                                    <img class="rounded-t-lg " src="{{ asset('images/home-image.png') }}" alt=""
                                        width="300" height="300" />
                                </div>
                            </a>
                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 12%"> 12%</div>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest
                                    enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
