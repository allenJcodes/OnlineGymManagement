@extends('layouts.app')

@section('content')
    <div class="container pt-12">

        <div class="flex justify-between mt-2">
            <a href="{{ route('equipment') }}" class="">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</button>
            </a>
            <a href="{{ route('equipment_types.create') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Equipment Type</button>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10" style="max-height: 85vh">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="height: 20vh">
                <thead
                    class="text-xs text-white uppercase  dark:bg-gray-700 dark:text-gray-400"style="background-color: #0F172A">

                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Equipment Type Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </thead>

                <tbody>

                    @foreach ($model as $m)
                        <tr>
                            <td scope="col" class="px-6 py-3">{{ $m->id }}</td>
                            <td scope="col" class="px-6 py-3">{{ $m->name }}</td>
                            <td>
                                <div class="px-6"style="">
                                    <button id="dropdownButton" data-dropdown-toggle="toggle{{ $m->id }}"
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
                                <div id="toggle{{ $m->id }}"
                                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2" aria-labelledby="dropdownButton">
                                        <li>
                                            <a href="{{ route('equipment_types.edit', ['equipment_type' => $m]) }}"
                                                class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <form class="w-full"
                                                action="{{ route('equipment_types.destroy', ['equipment_type' => $m]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
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
    </div>
@endsection
