@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <div class="flex items-start w-full justify-between ">

            <h1 class="text-2xl font-bold">Equipments</h1>

            @if (Auth::user()->user_role == 1)
                <div class="flex justify-end gap-2">
                    <a href="{{ route('equipment_types.index') }}" class="primary-button">
                        Manage Equipment Types
                    </a>

                    <a href="{{ route('equipment.create') }}" class="primary-button">
                        Add Equipment +
                    </a>
                </div>
            @endif

        </div>

        <div class="card">
            <h2 class="text-xl font-medium">Equipment List</h2>

            <div class="grid grid-cols-3 gap-3">
                @forelse ($equipments as $equipment)
                    <div class="relative">
                        @if (Auth::user()->user_role == 1)
                            <div class="absolute right-0 top-0 px-4 z-[999]">
                                <div class="pt-2" style="float: right; postion: absolute">
                                    <button id="dropdownButton" data-dropdown-toggle="toggle{{ $equipment->id }}" type="button" class="py-1 px-2 bg-gray-100/80 rounded-md ">
                                        <span class="sr-only">Open dropdown</span>
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Dropdown menu -->
            
                                <div id="toggle{{ $equipment->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">
                                    <div class="flex flex-col gap-2 divide-y divide-light-gray-background">
                                        <p class="text-background/70 text-sm pt-2 px-4 whitespace-nowrap">Actions - {{$equipment->equipment_name}}</p>
                                        
                                        <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                            <a href="{{route('equipment.edit', ['equipment' => $equipment])}}" class="py-2 px-4 hover:bg-off-white transition-all text-sm">Edit</a>
                                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                class="delete-button w-full text-left py-2 px-4 hover:bg-off-white hover:text-red-500 transition-all m-0" type="button"
                                                data-equipment="{{ json_encode($equipment) }}"
                                                data-url="{{ route('equipment.destroy', ['equipment' => $equipment]) }}">
                                               Archive
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="absolute top-2 left-2">
                            {{-- <div @class([
                                'flex py-1 px-2 text-xs rounded-full ring-1', 
                                'bg-green-100 ring-green-500 text-green-500' => $equipment->status == 'available',
                                'bg-red-100 ring-red-500 text-red-500' => $equipment->status == 'not_available',
                                'bg-orange-100 ring-orange-500 text-orange-500' => $equipment->status == 'under_maintenance',
                            ])>
                                {{str_replace('_', ' ', $equipment->status)}}
                            </div> --}}
                            <div @class([
                                'flex py-1 px-2 text-xs rounded-full ring-1', 
                                'bg-green-100 ring-green-500 text-green-500' => $equipment->isAvailable == 'available',
                                'bg-red-100 ring-red-500 text-red-500' => $equipment->isAvailable == 'unavailable',
                            ])>
                                {{str_replace('_', ' ', $equipment->isAvailable)}}
                            </div>
                        </div>

                        <div class="flex flex-col bg-white rounded-lg items-center overflow-clip border border-border">
                            <div class="h-[20vh] w-full flex items-center justify-center bg-dashboard-accent-light group overflow-clip">
                                <img src="{{ asset('image/equipment/' . $equipment->image_path) }}" class="h-full object-cover group-hover:scale-110 transition-[transform] duration-[1000ms]" alt="" />
                            </div>
                            <div class="flex flex-col w-full p-4 border-t border-border">
                                <h2 class="text-lg font-medium"> {{$equipment->equipment_name}} </h2>
                                <p> {{$equipment->equipmentDescription->content}} </p>
                                <div class="flex items-center">
                                    @php
                                        $totalCount = 0
                                    @endphp
                                    @foreach($equipment->equipmentStatus as $status)
                                    @switch($status->status)
                                        @case('available')
                                            @php
                                                $totalCount += $status->quantity
                                            @endphp
                                            <div class="mr-4 flex items-center" title="Available">
                                              <box-icon type="solid" name="check-circle" color="#22c55e" class="w-5"></box-icon>
                                              <span class="text-sm ml-1">{{$status->quantity}}</span>
                                            </div>
                                            @break
                                        @case('not_available')
                                            @php
                                                $totalCount += $status->quantity
                                            @endphp
                                            <div class="mr-4 flex items-center" title="Not Available">
                                              <box-icon type="solid" name="error" color="#eab308" class="w-5"></box-icon>
                                              <span class="text-sm ml-1">{{$status->quantity}}</span>
                                            </div>
                                            @break
                                        @case('under_maintenance')
                                            @php
                                                $totalCount += $status->quantity
                                            @endphp
                                            <div class="flex items-center" title="Under Maintenance">
                                              <box-icon type="solid" name="x-circle" color="#ef4444" class="w-5"></box-icon>
                                              <span class="text-sm ml-1">{{$status->quantity}}</span>
                                            </div>
                                            @break
                                    @endswitch
                                    @endforeach

                                    <p class="ml-5 text-sm">Total Count: {{$totalCount}}</p>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Items yet</td>
                    </tr>
                @endforelse
            </div>
        </div>
    </div>

    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">
        <div class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-fit min-h-[10vh] max-h-[90vh] max-w-[60vw] gap-5 overflow-x-hidden overflow-y-auto'>
            <p id="modal-text"></p>
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="modal_id" name="equipment_id">
                <div class="w-full flex justify-end gap-2">
                    <button type="button" class="outline-button" data-modal-hide="popup-modal">
                        Cancel
                    </button>
                    <button type="submit" class="primary-button">
                       Archive
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        const modalText = document.querySelector('#modal-text');
        const modalIdField = document.querySelector('#modal_id');

        deleteButtons.forEach(button => {
            const equipment = JSON.parse(button.dataset.equipment);
            button.addEventListener('click', () => {
                modalText.innerText = "Are you sure you want to archive equipment \"" + equipment.equipment_name + "\" ?";
                modalIdField.value = equipment.id

                const modalForm = modalIdField.parentElement;
                modalForm.action = button.dataset.url;
                
                const submitButton = modalIdField.nextElementSibling.querySelector('button[type="submit"]');
                submitButton.addEventListener('click', () => {
                    modalForm.submit();
                });
            });
        })
    </script>
@endsection
