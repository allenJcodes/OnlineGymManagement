@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-14 gap-5 text-background">
        <div class="flex items-start w-full justify-between">
            <h1 class="text-2xl font-bold">View Attendance</h1>
            <button id="scan-qr-button" class="primary-button"> Scan QR</button>
        </div>

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

            <div class="form-field-container">
                <label for="content" class="form-label">Schedule Date</label>
                <span class="text-sm pl-2">{{$attendance->schedule->date_time_start->format('M d, Y')}}</span>
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
                                {{ $userAttendance->time_in->format('h:i A') }}
                            </td>
                            <td class="py-2">
                                {{ $userAttendance->time_out ? $userAttendance->time_out->format('h:i A') : '--' }}
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
    <div id="scan-qr-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

        <div
            class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[70vh] max-w-[40vw] gap-5'>

            <div class="flex flex-col gap-5">
                <h2 class="text-lg font-bold">Scan or Upload QR</h2>

                <div class="form-field-container">
                    <p class="form-label">Subscriber's Name</p>
                    <h2 id="modal-fullname"></h2>
                </div>

                <form id="qr-form" action="{{ route('user_attendance.store') }}" method="POST" class="w-full flex flex-col gap-3">
                    @csrf
                    <input id="modal-user-id" type="hidden" name="user_id">
                    <input id="modal-attendance-id" type="hidden" name="attendance_id" value="{{$attendance->id}}">
                    <div class="form-field-container">
                        <label for="mode_of_payment" class="form-label">Scan QR Code</label>
                        <video id="qr-video"></video>
                    </div>
                    
                    <div class="self-end flex gap-2">
                        <button id="close-qr-modal" type="button" class="outline-button">
                            Cancel
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
