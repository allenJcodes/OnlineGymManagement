@extends('layouts.app')

@section('content')
    <div class="container pt-10">
        <div class="flex justify-start pr-4 pb-10 pt-3">
            <div class="text-3xl">Attendance</div>
        </div>
        <div class="relative overflow-x-auto shadow-md rounded-md"
            style="background-color: rgb(247, 247, 247); max-height: 79vh">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="height: 20vh">
                <thead class="text-xs text-white uppercase  dark:bg-gray-700 dark:text-gray-400"
                    style="background-color: #0F172A">
                    <tr>

                        <th class="px-6 py-3  text-center text-white ">
                            User ID
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            User Name
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Email
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Attended
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            QRCode
                        </th>
                        <th class="px-6 py-3  text-center text-white ">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendance->attendances as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="px-6 py-4 font-medium {{ $item->attended == 0 ? 'text-red-600' : 'text-gray-900' }} whitespace-nowrap dark:text-white">
                                {{ $item->user_id }}
                            </th>
                            <td class="px-6 py-4 {{ $item->attended == 0 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $item->ownedBy->name }}
                            </td>
                            <td class="px-6 py-4 {{ $item->attended == 0 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $item->ownedBy->email }}
                            </td>
                            <td class="px-6 py-4 {{ $item->attended == 0 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $item->attended == '0' ? 'No' : 'Yes' }}
                            </td>
                            <td class="px-6 py-4 {{ $item->attended == 0 ? 'text-red-600' : 'text-green-600' }}">
                                <div id="QRCode" data-attendance="{{ $item }}"></div>
                            </td>


                            @if ($item->attended == '0')
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
                                                <a href="/attendance/attended/{{ $item->id }}/{{ $attendance->id }}"
                                                    class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Attended</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            @else
                                <td></td>
                            @endif
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
