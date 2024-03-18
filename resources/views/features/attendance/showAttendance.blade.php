@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-14 gap-5 text-background">
        <div class="flex items-start w-full justify-between">
            <h1 class="text-2xl font-bold">Attendees</h1>
            <form action="{{route('user_attendance.store')}}" method="POST">
                @csrf
                <input type="hidden" name="attendance_id" value="{{$attendance->id}}">
                <button class="primary-button"> Scan QR</button>
            </form>
        </div>

        <h1 class="text-2xl font-bold">View Attendance</h1>

        <div class="flex flex-col gap-3 card">
            <div class="form-field-container">
                <label for="title" class="form-label">Class name</label>
                <span class="text-sm pl-2">{{$attendance->schedule->class_name}}</span>
            </div>

            <div class="form-field-container">
                <label for="title" class="form-label">Instructor Name</label>
                <span class="text-sm pl-2">{{$attendance->schedule->instructor->user->full_name}}</span>
            </div>

            <div class="form-field-container">
                <label for="content" class="form-label">Attendees Count</label>
                <span class="text-sm pl-2">{{$attendance->userAttendances->count()}}</span>
            </div>
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Attendees List</h2>
                    <x-table-search />
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Name
                            </td>
                            <td class="py-2">
                                Email
                            </td>
                            <td class="py-2">
                                Time In
                            </td>
                            <td class="py-2">
                                Time Out
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendance->userAttendances as $userAttendance)
                        <tr class="table-row">
                            <td class="py-2">
                                {{ $userAttendance->user->full_name }}
                            </td>
                            <td class="py-2">
                                {{ $userAttendance->user->email}}
                            </td>
                            <td class="py-2">
                                {{ $userAttendance->time_in }}
                            </td>
                            <td class="py-2">
                                {{ $userAttendance->time_out ?? '--' }}
                            </td> 
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- need i separate query ng user attendance pag lalagyan pagination --}}
            {{-- @if($attendance->userAttendances->hasPages())
                <div class="card">
                    {{$attendance->userAttendances->links()}}
                </div>
            @endif --}}
        </div>
    </div>
    <div id="popup-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

        <div
            class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[90vh] max-w-[60vw] gap-5'>

            <div class="flex justify-center "><img src="{{ asset('images/logo.png') }}" alt="" width="100"
                    height="100"></div>

            <div class="flex flex-col gap-5">
                <h2 class="text-lg font-bold">New Subscription</h2>

                <div class="form-field-container">
                    <p class="form-label">Subscriber's Name</p>
                    <h2 id="modal-fullname">-</h2>
                </div>

                <form action="{{ route('membership.store') }}" method="POST" class="w-full flex flex-col gap-3">
                    @csrf

                    <input id="user_id" name="user_id" type="hidden">

                    <div class="form-field-container">
                        <p class="form-label">Choose Subscription</p>
                        <div class="grid w-full gap-6 md:grid-cols-2">
                            @foreach ($subscriptions as $key => $subscription)
                                <label for="membership{{ $key }}"
                                    class="group flex rounded-lg ring-1 ring-border py-2 px-4 gap-4 has-[:checked]:bg-dashboard-accent-light has-[:checked]:ring-dashboard-accent-base cursor-pointer group">
                                    <input type="radio" id="membership{{ $key }}" name="subscription_type_id"
                                        value="{{ $subscription->id }}" class="hidden">
                                    <div class="flex flex-col">
                                        <p class="w-full text-base font-semibold">
                                            {{ $subscription->number_of_months }}
                                            Month{{ $subscription->number_of_months > 1 ? 's' : '' }}
                                        </p>
                                        <p>P{{ $subscription->price }}</p>
                                        <p class="text-xs text-dark-gray-800">{{ $subscription->description }}</p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-field-container">
                        <label for="mode_of_payment" class="form-label">Mode of Payment</label>
                        <select id="mode_of_payment" name="mode_of_payment" class="form-input">
                            <option value="" selected disabled>Select mode of payment</option>
                            <option value="cash">Cash</option>
                            <option value="gcash">GCash</option>
                        </select>
                    </div>

                    <div class="form-field-container">
                        <label for="reference_number" class="form-label">Reference Number <span
                                class="text-dark-gray-800 text-xs italic ml-2">optional</span></label>
                        <input id="reference_number" name="reference_number" type="text" class="form-input">
                    </div>

                    <div class="self-end flex gap-2">
                        <button type="button" class="outline-button" data-modal-hide="popup-modal">
                            Cancel
                        </button>
                        <button type="submit" class="primary-button">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        const subscribeButtons = document.querySelectorAll('.subscribe-button');

        const modalFullname = document.querySelector('#modal-fullname');
        const userIdField = document.querySelector('#user_id');

        subscribeButtons.forEach(button => {
            const user = JSON.parse(button.dataset.user);
            button.addEventListener('click', () => {
                modalFullname.innerText = user.full_name;
                userIdField.value = user.id
            });
        })
    </script>
@endsection
