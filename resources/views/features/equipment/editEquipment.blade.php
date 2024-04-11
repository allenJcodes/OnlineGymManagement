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
                <label for="equipment_description_id" class="form-label">Description</label>
                <select name="equipment_description_id" id="equipment_description_id" class="form-input">
                    <option {{!$equipment->equipment_description_id  ? 'selected' : ''}} value="" disabled>Select Description</option>
                    @foreach ($equipmentDescriptions as $equipmentDescription)
                        <option {{$equipment->equipment_description_id == $equipmentDescription->id ? 'selected' : ''}}  value="{{ $equipmentDescription->id }}">{{ $equipmentDescription->content }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field-container">
                <label for="equipment_type_id" class="form-label">Equipment Type</label>
                <select name="equipment_type_id" id="equipment_type_id" class="form-input">
                    <option {{!$equipment->equipment_type_id  ? 'selected' : ''}} value="" disabled>Select Equipment Type</option>
                    @foreach ($equipmentTypes as $equipmentType)
                        <option {{$equipment->equipment_type_id == $equipmentType->id ? 'selected' : ''}} value="{{ $equipmentType->id }}">{{ $equipmentType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="available" class="form-label">Quantity (Available)</label>
                    <input value="{{$equipment->equipmentStatus[0]->quantity}}"id="available" class="form-input" type="number" name="available" min="0" placeholder="0">
                </div>

                <div class="form-field-container">
                    <label for="not_available" class="form-label">Quantity (Not Available)</label>
                    <input value="{{$equipment->equipmentStatus[1]->quantity}}" id="not_available" class="form-input" type="number" name="not_available" min="0"
                        placeholder="0">
                </div>

                <div class="form-field-container">
                    <label for="under_maintenance" class="form-label">Quantity (Under Maintenance)</label>
                    <input value="{{$equipment->equipmentStatus[2]->quantity}}" id="under_maintenance" class="form-input" type="number" name="under_maintenance" min="0"
                        placeholder="0">
                </div>
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
