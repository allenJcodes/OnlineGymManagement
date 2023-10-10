@extends('layouts.app')

@section('content')
    <div class="container pt-14">
        <div class="flex justify-end pr-4">
            <a href="{{ route('addItem') }}">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                    Item</button>
            </a>
        </div>
        <div class="">
            <table id="inventoryTable" class="display" style="width: 100%">
                <thead class="">
                    <tr>
                        <th class="px-6 py-3">
                            Item name
                        </th>
                        <th class="px-6 py-3">
                            Quantity
                        </th>
                        <th class="px-6 py-3">
                            Equipment Type
                        </th>
                        <th class="px-6 py-3">
                            Purchase Date
                        </th>
                        <th class="px-6 py-3">
                            Warranty Information
                        </th>
                        <th class="px-6 py-3">
                            Maintenance History
                        </th>
                        <th class="px-6 py-3">
                            Status
                        </th>
                        <th class="px-6 py-3">
                            Actions
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @forelse ($item as $items)
                        <tr>
                            <td>
                                {{ $items->item_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->equipment_type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->purchase_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->warranty_information }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->maintenance_history }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->status }}
                            </td>

                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>

                </tbody>

            @empty
                @endforelse
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
                pageLength: 4,
                ordering: true
            });
        })
    </script>
@endsection
