@extends('layouts.app')

@section('content')
    <div class="containter pt-14 ">
        <div class="flex justify-end pr-4">
            <a href="{{ route('AddEquipment') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Equipment</button>
            </a>
        </div>


        <div class="grid grid-cols-3">
            @forelse ($equipment as $item)
                <div class="col-span-1 pb-5 ml-2 mr-2">
                    <div
                        class="transition delay-50 duration-800 ease-in-out hover:bg-gray-200 hover:drop-shadow-lg max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="px-4  ">
                            <div class="pt-2"style="z-index: 1;  float: right; postion: absolute">
                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $item->id }}"
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
                            <!-- Dropdown menu -->
                            <div id="toggle{{ $item->id }}"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="dropdownButton">

                                    <li>
                                        <a href="/editEquipment/{{ $item->id }}"
                                            class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a id="delete{{ $item->id }}"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div href="/editEquipment/{{ $item->id }}" class="MT-3">
                            @if ($item->status == 'Available')
                                <span
                                    class="absolute  bg-green-200 text-green-800 text-xs font-medium ml-2 mt-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Available</span>
                            @elseif ($item->status == 'Not Available')
                                <span
                                    class="absolute bg-red-200 text-red-800 text-xs font-medium ml-2  mt-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Not
                                    Available</span>
                            @elseif ($item->status == 'Under Maintenance')
                                <span
                                    class="absolute bg-yellow-100 text-yellow-800 text-xs font-medium ml-2 mt-2  px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Under
                                    Maintenance </span>
                            @endif
                            <div class="flex justify-center items-center pt-8 pl-12">

                                <img src="{{ asset('image/equipment/' . $item->image_path) }}" class="h-36 justify-center"
                                    alt="" />
                            </div>

                            <div class="flex justify-center items-center pt-5 pl-16 pr-16">
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 85%"> 85%</div>
                                </div>
                            </div>
                            <div class="p-5">

                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                    {{ $item->equipment_name }}</h5>

                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                                    {{ $item->description }}</p>
                            </div>
                        </div>

                        {{-- <span class="text-red-500 p-2">

                            <button id="delete{{ $item->id }}" type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DELETE</button>
                        </span> --}}

                    </div>
                </div>
                <script>
                    $("#delete{{ $item->id }}").click(function() {
                        const formdata = new FormData()
                        formdata.append("id", "{{ $item->id }}")
                        axios.post("/deleteEquipment", formdata)
                            .then(() => {
                                swal({
                                    icon: "success",
                                    title: "Item Deleted!",
                                    text: "Item has been deleted successfully!",
                                    buttons: false
                                }).then(() => {
                                    location.reload()
                                })
                            })
                    })
                </script>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Items yet</td>

                </tr>
            @endforelse

        </div>
    </div>
@endsection
