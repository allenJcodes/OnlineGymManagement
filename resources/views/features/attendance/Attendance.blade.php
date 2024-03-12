@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <div class="flex items-start w-full justify-between">
            <h1 class="text-2xl font-bold">Attendance</h1>
            <a href="{{ route('contents.contact.create') }}" class="primary-button">
                Add Attendance ?
            </a>
        </div>
        
        <div class="flex flex-col gap-2">

            <div class="card">

                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Attendance List</h2>
                    {{-- form actions here --}}
                    <form class="w-[30%]">
                        <input id="search" type="text" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search something">
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Class Name
                            </td>
                            <td class="py-2">
                                Instructor Name
                            </td>
                            <td class="py-2">
                                Attendees
                            </td>
                            <td class="py-2">
                                Date Start
                            </td>
                            <td class="py-2">
                                Date End
                            </td>
                            <td class="py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($allAttendances as $item)
                        <tr class="table-row">
                            <td class="py-2">
                                {{ $item->class_name }}
                            </td>
                            <td class="py-2">
                                {{ $item->user->full_name }}
                            </td>
                            <td class="py-2">
                                {{ $item->number_of_attendees }}
                            </td>
                            <td class="py-2">
                                {{ $item->date_time_start }} 
                            </td>
                            <td class="py-2">
                                {{ $item->date_time_end }}
                            </td> 
                            <td>
                                <div class="flex items-center w-full">
                                    <div class="text-left">
                                        <button id="dropdownButton" data-dropdown-toggle="toggle{{ $item->id }}" class="" type="button">
                                            <span class="sr-only">Open dropdown</span>
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>
                                        </button>
                                    </div>
    
                                    <div id="toggle{{ $item->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">
    
                                        <div class="flex flex-col gap-2 divide-y divide-light-gray-background">
    
                                            <p class="text-background/70 text-sm pt-2 px-4">Actions - {{$item->class_name}}</p>
                                            

                                            {{-- di ko pa alam actions neto --}}
                                            {{-- <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                <a href="{{route('contents.contact.edit', ['contact' => $item])}}" class="py-2 px-4 hover:bg-off-white transition-all">Edit</a>

                                                <form class="w-full py-2 px-4 hover:bg-off-white transition-all m-0" action="{{route('contents.contact.destroy', ['contact' => $item])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="w-full text-left">Delete</button>
                                                </form>
                                            </div> --}}
                                        </div>
    
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                    No items
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@endsection
