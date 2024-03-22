@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <a href="{{ route('equipment.index') }}" class="w-fit outline-button">< Back to Equipments</a>

        <div class="flex items-start w-full justify-between">

            <h1 class="text-2xl font-bold">Equipment Types</h1>

            <div class="flex justify-end gap-2">
                <a href="{{ route('equipment_types.create') }}">
                    <button type="button" class="primary-button">Add Equipment Type +</button>
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Equipment Type List</h2>
                    {{-- form actions here --}}
                    <form class="w-[30%]">
                        <input id="search" type="text" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search something">
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                #
                            </td>
                            <td class="py-2">
                                Equipment Type Name
                            </td>
                            <td class="py-2">
                                Actions
                            </td>
                        </tr>

                    </thead>
    
                    <tbody>
                        @if (count($model))
                            @foreach ($model as $m)
                                <tr class="table-row">
                                    <td class="py-2">{{ $m->id }}</td>
                                    <td class="py-2">{{ $m->name }}</td>
                                    <td class="py-2">
                                        <div class="flex items-center w-full">
                                            <div class="text-left">
                                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $m->id }}" class="" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <div id="toggle{{ $m->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">
                                                <div class="flex flex-col gap-2 divide-y divide-light-gray-background">
                                                    <p class="text-background/70 text-sm pt-2 px-4">Actions - {{$m->name}}</p>
                                                    <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                        <a href="{{ route('equipment_types.edit', ['equipment_type' => $m]) }}" class="py-2 px-4 hover:bg-off-white transition-all">Edit</a>
                                                        <form class="w-full" action="{{ route('equipment_types.destroy', ['equipment_type' => $m]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="py-2 px-4 hover:bg-off-white transition-all w-full text-left">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                    No items
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if($model->hasPages())
                <div class="card">
                    {{$model->links()}}
                </div>
            @endif
            
        </div>
    </div>
@endsection
