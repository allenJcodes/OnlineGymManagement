@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <div class="flex items-start w-full justify-between">

            <h1 class="text-2xl font-bold">Inventory</h1>

            <a href="{{ route('inventory.create') }}" class="primary-button">
                Add Item +
            </a>

        </div>

        <div class="flex flex-col gap-2">
            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Inventory List</h2>
                    {{-- form actions here --}}
                    <x-table-search/>

                </div>
            
                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Item name
                            </td>
                            <td class="py-2">
                                Quantity
                            </td>
                            <td class="py-2">
                                Equipment Type
                            </td>
                            <td class="py-2">
                                Purchase Date
                            </td>
                            <td class="py-2">
                                Warranty Information
                            </td>
                            <td class="py-2">
                                Maintenance History
                            </td>
                            <td class="py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($inventories))
                            @foreach ($inventories as $inventory)
                                <tr class="table-row">
                                    <td class="py-2">
                                        {{ $inventory->equipment->equipment_name }}
                                    </td>
                                    <td class="py-2">
                                        {{ $inventory->quantity }}
                                    </td>
                                    <td class="py-2">
                                        {{ $inventory->equipment->equipmentType->name ?? '--' }}
                                    </td>
                                    <td class="py-2">
                                        {{ $inventory->purchase_date }}
                                    </td>
                                    <td class="py-2">
                                        {{ $inventory->warranty_information }}
                                    </td>
                                    <td class="py-2">
                                        {{ $inventory->maintenance_history }}
                                    </td>
                                    <td class="py-2">
                                        <div class="flex items-center w-full">
                                            <div class="text-left">
                                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $inventory->id }}" class="" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>
                                            </div>
    
                                            <div id="toggle{{ $inventory->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">

                                                <div class="flex flex-col gap-2 divide-y divide-light-gray-background">

                                                    <p class="text-background/70 text-sm pt-2 px-4">Actions - {{$inventory->equipment->equipment_name}}</p>

                                                    <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                        <a href="{{route('inventory.edit', ['inventory' => $inventory])}}" class="py-2 px-4 hover:bg-off-white transition-all">Edit</a>
                                                        <form class="w-full py-2 px-4 hover:bg-off-white transition-all m-0"
                                                        action="{{ route('inventory.destroy', ['inventory' => $inventory]) }}"
                                                        method="POST">
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

            @if($inventories->hasPages())
                <div class="card">
                    {{$inventories->links()}}
                </div>
            @endif
        </div>

    </div>
@endsection
