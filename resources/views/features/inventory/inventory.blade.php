@extends('layouts.app')

@section('content')
    <div class="container pt-10">
        <div class="flex justify-end pr-4">
            <a href="{{ route('addItem') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Item</button>
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md rounded-md"
            style="background-color: rgb(247, 247, 247); max-height: 79vh">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="height: 20vh">
                <thead class="text-xs text-white uppercase  dark:bg-gray-700 dark:text-gray-400"
                    style="background-color: #0F172A">
                    <tr>

                        <th class="px-6 py-3  text-center text-white ">
                            Item name
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Quantity
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Equipment Type
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Purchase Date
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Warranty Information
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Maintenance History
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Status
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($item as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->item_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->equipment_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->purchase_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->warranty_information }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->maintenance_history }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->status }}
                            </td>



                            <td>
                                <div class="text-right pr-5"style="">
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
                                <div id="toggle{{ $item->id }}"
                                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2" aria-labelledby="dropdownButton">

                                        <li>
                                            <a href="/editItem/{{ $item->id }}"
                                                class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a id="delete{{ $item->id }}"
                                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <script>
                            $("#delete{{ $item->id }}").click(function() {
                                const formdata = new FormData()
                                formdata.append("id", "{{ $item->id }}")
                                axios.post("/deleteItem", formdata)
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
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#inventoryTable').DataTable({
                dom: "Bfrltip",
                lengthMenu: [5, 10, 20, 50],

                paging: false,
                scrollCollapse: true,
                scrollY: '450px'
            });
        })
    </script>
@endsection
