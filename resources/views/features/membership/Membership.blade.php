@extends('layouts.app')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20" style="max-height: 85vh">
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            <div>
                {{-- <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    <span class="sr-only">Action button</span>
                    Action
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button> --}}
                <!-- Dropdown menu -->
                {{-- <div id="dropdownAction"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Renew</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                                account</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                            User</a>
                    </div>
                </div> --}}
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" style="height: 20vh">
            <thead class="text-xs text-white uppercase  dark:bg-gray-700 dark:text-gray-400"
                style="background-color: #0F172A">
    </div>
    </th>

    <th scope="col" class="px-6 py-3">
        Name
    </th>
    <th scope="col" class="px-6 py-3">
        Start Date
    </th>
    <th scope="col" class="px-6 py-3">
        End Date
    </th>
    <th scope="col" class="px-6 py-3">
        Status
    </th>
    <th scope="col" class="px-6 py-3">
        Action
    </th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                {{-- <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> --}}
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{ $user->name }}</div>
                        <div class="font-normal text-gray-500">{{ $user->email }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    @if ($user->membership == null)
                        --
                    @else
                        {{ $user->membership->date_started }}
                    @endif

                </td>
                <td class="px-6 py-4">
                    @if ($user->membership == null)
                        --
                    @else
                        {{ $user->membership->date_ended }}
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                        @if ($user->membership == null)
                            --
                        @else
                            @if ($user->membership->date_ended == now()->format('Y-m-d'))
                                Unsubscribed
                            @else
                                Subscribed
                            @endif
                        @endif


                    </div>
                </td>
                <td>
                    @if ($user->membership == null)
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal{{ $user->id }}"
                            class="block text-white bg-green-500 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Subscribe
                        </button>
                    @else
                        <button data-modal-target="popup-modal2" data-modal-toggle="popup-modal2{{ $user->id }}"
                            class="block text-white bg-red-700 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Unsubscribe
                        </button>
                    @endif
                    {{-- subscribe modal --}}
                    <div id="popup-modal{{ $user->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">

                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">

                                    <div class="flex justify-center "> <img src="{{ asset('images/logo.png') }}"
                                            alt="" width="250" height="250"></div>
                                    <h3
                                        class="mb-5 text-lg font-medium text-gray-900 dark:text-white pt-10 flex justify-center">
                                        Name: {{ $user->name }}</h4>


                                        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">
                                            Subscription
                                            Details:</h3>
                                        <ul class="grid w-full gap-6 md:grid-cols-2">
                                            <li class="flex justify-center items-center space-x-4">
                                                <input type="radio" id="hosting-small"
                                                    name="membership{{ $user->id }}" value="6 months" class=" peer"
                                                    required>
                                                <label for="hosting-small"
                                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">0-6 Months
                                                        </div>
                                                        <div class="w-full">P4200</div>
                                                        <div class="w-full">Good for NEWBIES</div>
                                                    </div>
                                                    <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                    </svg>
                                                </label>
                                            </li>
                                            <li class="flex justify-center items-center space-x-4">
                                                <input type="radio" id="hosting-big" name="membership{{ $user->id }}"
                                                    value="12 months" class=" peer">
                                                <label for="hosting-big"
                                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">6-12
                                                            Months</div>
                                                        <div class="w-full">P8400</div>
                                                        <div class="w-full">Good for REGULARS</div>
                                                    </div>
                                                    <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                    </svg>
                                                </label>
                                            </li>
                                        </ul>


                                    </h3>
                                    <button data-modal-hide="popup-modal" type="button"
                                        id="submitMembership{{ $user->id }}"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mt-10">
                                        Submit
                                    </button>
                                    <button data-modal-hide="popup-modal{{ $user->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Unsubscribe modal --}}
                    <div id="popup-modal2{{ $user->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">

                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">

                                    <div class="flex justify-center "> <img src="{{ asset('images/logo.png') }}"
                                            alt="" width="250" height="250"></div>
                                    <h3
                                        class="mb-5 text-lg font-medium text-gray-900 dark:text-white pt-10 flex justify-center">
                                        Name: {{ $user->name }}</h4>


                                        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">
                                            Subscription
                                            Details:</h3>
                                        <ul class="grid w-full gap-6 md:grid-cols-2">
                                            <li class="flex justify-center items-center space-x-4">
                                                <input type="radio" id="hosting-small"
                                                    name="membership{{ $user->id }}" value="6 months" class=" peer"
                                                    required>
                                                <label for="hosting-small"
                                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">0-6 Months
                                                        </div>
                                                        <div class="w-full">P4200</div>
                                                        <div class="w-full">zzzzz</div>
                                                    </div>
                                                    <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                    </svg>
                                                </label>
                                            </li>
                                            <li class="flex justify-center items-center space-x-4">
                                                <input type="radio" id="hosting-big"
                                                    name="membership{{ $user->id }}" value="12 months"
                                                    class=" peer">
                                                <label for="hosting-big"
                                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">6-12
                                                            Months</div>
                                                        <div class="w-full">P8400</div>
                                                        <div class="w-full">Good for REGULARS</div>
                                                    </div>
                                                    <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                    </svg>
                                                </label>
                                            </li>
                                        </ul>


                                    </h3>
                                    <button data-modal-hide="popup-modal2{{ $user->id }}" type="button"
                                        id="submitMembership{{ $user->id }}"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mt-10">
                                        Submit
                                    </button>
                                    <button data-modal-hide="popup-modal2{{ $user->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

            <script>
                $('#submitMembership{{ $user->id }}').click(function() {
                    const membershipValue = $("input[name='membership{{ $user->id }}']:checked").val()
                    var currentDate = moment();
                    var monthlyDatesArray = [];
                    var subscription = '';
                    if (membershipValue == '6 months') {
                        var sixMonthsLater = moment().add(6, 'months');
                        subscription = moment().add(6, 'months').format('YYYY-MM-DD');
                        console.log(sixMonthsLater)

                        // while (currentDate.isBefore(sixMonthsLater) || currentDate.isSame(sixMonthsLater, 'day')) {
                        //     var formattedDate = currentDate.format('YYYY-MM-DD');
                        //     monthlyDatesArray.push(formattedDate);
                        //     // $('#monthly-dates-list').append('<li>' + formattedDate + '</li>');
                        //     currentDate.add(1, 'months');
                        // }

                        // Output the monthly dates array to the console
                        // console.log(monthlyDatesArray);


                    } else {
                        var twelveMonthsLater = moment().add(12, 'months');
                        subscription = moment().add(12, 'months').format("YYYY-MM-DD");


                        // while (currentDate.isBefore(twelveMonthsLater) || currentDate.isSame(twelveMonthsLater, 'day')) {
                        //     var formattedDate = currentDate.format('YYYY-MM-DD');
                        //     monthlyDatesArray.push(formattedDate);
                        //     currentDate.add(1, "months");


                        // }
                        console.log(twelveMonthsLater);
                    }
                    const formdata = new FormData();
                    formdata.append('user_id', "{{ $user->id }}");
                    formdata.append('date_started', moment().format("YYYY-MM-DD"))
                    formdata.append('date_ended', subscription)
                    // formdata.append('dates', JSON.stringify(monthlyDatesArray));
                    // console.log([...formdata])
                    axios.post('/membership', formdata)
                        .then((response) => {
                            swal({
                                icon: "success",
                                title: "Subscribed!",
                                text: "User has subscribed successfully!",
                            }).then(() => {
                                location.reload()
                            })
                            // console.log(response.data)
                        })
                        .catch(err => {
                            console.log(err.response)
                        })


                })
            </script>
        @endforeach

    </tbody>
    </table>
    </div>
@endsection
