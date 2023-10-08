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


        <div class="grid grid-cols-3">
            @forelse ($equipment as $item)
                <div class="col-span-1 pb-5 ml-2 mr-2">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="/editEquipment/{{ $item->id }}">
                            @if ($item->status == 'Available')
                                <span
                                    class="absolute bg-green-200 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Available</span>
                            @elseif ($item->status == 'Not Available')
                                <span
                                    class="absolute bg-red-200 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Not
                                    Available</span>
                            @elseif ($item->status == 'Under Maintenance')
                                <span
                                    class="absolute bg-yellow-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Under
                                    Maintenance </span>
                            @endif
                            <div class="flex justify-center items-center">

                                <img src="{{ asset('image/equipment/' . $item->image_path) }}" class="h-36"
                                    alt="" />
                            </div>

                            <div class="flex justify-center items-center pt-5 ml-5 mr-5">
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
                        </a>

                        <span class="text-red-500 p-2">

                            <button id="delete{{ $item->id }}" type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DELETE</button>
                        </span>

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
