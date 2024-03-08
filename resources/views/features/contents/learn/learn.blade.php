@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-2">
        <div class="flex justify-end">
            <a href="{{ route('contents.learn.create') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Item</button>
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md rounded-md"
            style="background-color: rgb(247, 247, 247); max-height: 79vh">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="height: 20vh">
                <thead class="text-xs text-white uppercase  dark:bg-gray-700 dark:text-gray-400"
                    style="background-color: #0F172A">
                    <tr>
                        <th class="px-6 py-3 text-left text-white ">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-white ">
                            Subtitle
                        </th>
                        <th class="px-6 py-3 text-left text-white ">
                            Content
                        </th>
                        <th class="px-6 py-3 text-center text-white ">
                            Created At
                        </th>
                        <th class="px-6 py-3 text-center text-white ">
                            Updated At
                        </th>
                        <th class="px-6 py-3 text-center text-white ">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($learnContents as $learnContent)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row"
                            class="px-6 py-3 font-medium text-gray-900 dark:text-white align-top text-left">
                            {{ $learnContent->title }}
                        </td>
                        <td class="px-6 py-3 align-top text-left">
                            {{ $learnContent->subtitle }}
                        </td>
                        <td class="px-6 py-3 align-top text-left">
                            {{ $learnContent->content }}
                        </td>
                        <td class="px-6 py-3 text-center">
                            {{ $learnContent->created_at }}
                        </td>
                        <td class="px-6 py-3 text-center">
                            {{ $learnContent->updated_at }}
                        </td> 
                        <td>
                            <div class="text-right pr-5"style="">
                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $learnContent->id }}"
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
                            <div id="toggle{{ $learnContent->id }}"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="dropdownButton">

                                    <li>
                                        <a href="{{route('contents.learn.edit', $learnContent->id)}}"
                                            class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a id="delete{{ $learnContent->id }}"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection