@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        
        <div class="flex items-start w-full justify-between ">
            <h1 class="text-2xl font-bold">Learn Content</h1>

            <a href="{{ route('contents.learn.create') }}" class="primary-button">
                Add Learn Content +
            </a>
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">

                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Learn Contents List</h2>
                    {{-- form actions here --}}
                    <form class="w-[30%]">
                        <input id="search" type="text" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search something">
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Title
                            </td>
                            <td class="py-2">
                                Subtitle
                            </td>
                            <td class="py-2">
                                Content
                            </td>
                            <td class="py-2">
                                Created At
                            </td>
                            <td class="py-2">
                                Updated At
                            </td>
                            <td class="py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($learnContents as $learnContent)
                        <tr class="table-row">
                            <td class="py-2 pr-2">
                                {{ $learnContent->title }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->subtitle }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->content }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->created_at }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->updated_at }}
                            </td> 
                            <td>
                                <div class="flex items-center w-full">
                                    <div class="text-left">
                                        <button id="dropdownButton" data-dropdown-toggle="toggle{{ $learnContent->id }}" class="" type="button">
                                            <span class="sr-only">Open dropdown</span>
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div id="toggle{{ $learnContent->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">

                                        <div class="flex flex-col gap-2 divide-y divide-light-gray-background">

                                            <p class="text-background/70 text-sm pt-2 px-4">Actions - {{ $learnContent->title }}</p>

                                            <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                <a href="{{route('contents.learn.edit', ['learn' => $learnContent])}}" class="py-2 px-4 hover:bg-off-white transition-all">Edit</a>
                                                <form class="w-full py-2 px-4 hover:bg-off-white transition-all m-0" action="{{route('contents.learn.destroy', ['learn' => $learnContent])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="w-full text-left">Delete</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                No instructors
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>


        </div>

        <div class="relative overflow-x-auto shadow-md rounded-md"
            style="background-color: rgb(247, 247, 247); max-height: 79vh">

        </div>
    </div>
@endsection