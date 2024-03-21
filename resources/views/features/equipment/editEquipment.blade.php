@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <h1 class="text-2xl font-bold">Edit Equipment</h1>

        <form enctype="multipart/form-data" action="{{ route('equipment.update', ['equipment' => $equipment]) }}" method="POST" class="flex flex-col gap-3 card">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="equipment_name" class="form-label">Equipment Name</label>
                <input value="{{$equipment->equipment_name}}" id="equipment_name" type="text" name="equipment_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="description" class="form-label">Description</label>
                <input value="{{$equipment->description}}" id="description" type="text" name="description" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="equipment_type_id" class="form-label">Equipment Type</label>
            
                {{-- @dd($equipment->equipment_type_id, $equipmentTypes[0]->id) --}}
                <select name="equipment_type_id" id="equipment_type_id" class="form-input">
                    <option {{!$equipment->equipment_type_id  ? 'selected' : ''}} value="" disabled>Select Equipment Type</option>
                    @foreach ($equipmentTypes as $equipmentType)
                        <option {{$equipment->equipment_type_id == $equipmentType->id ? 'selected' : ''}} value="{{ $equipmentType->id }}">{{ $equipmentType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field-container">
                <label for="status" class="form-label">Status</label>
            
                <select name="status" id="status" class="form-input">
                    <option value="" disabled>Select status</option>
                    <option {{$equipment->status == 'available' ? 'selected' : ''}} value="available">Available</option>
                    <option {{$equipment->status == 'not_available' ? 'selected' : ''}} value="not_available">Not Available</option>
                    <option {{$equipment->status == 'under_maintenance' ? 'selected' : ''}} value="under_maintenance">Under Maintenance</option>
                </select>
            </div>


            <label for="image" class="form-input flex items-center justify-center cursor-pointer hover:bg-border">
                Upload Image

                <input id="image" name="image" type="file" class="hidden max-h-0 max-w-0">
            </label>

            <div class="self-end flex gap-2">
                <a href="{{ route('equipment.index') }}" class="outline-button">
                    Back
                </a>
                <button class="primary-button">Save Changes</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="flex flex-col gap-1">
                @foreach ($errors->all() as $error)
                    <p class="text-red-500 text-xs">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
@endsection
