@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        <h1 class="text-2xl font-bold">Add Equipment</h1>

        <form enctype="multipart/form-data" action="{{ route('equipment.store') }}" method="POST"
            class="flex flex-col gap-3 card">
            @csrf

            <div class="form-field-container">
                <label for="equipment_name" class="form-label">Equipment Name</label>
                <input id="equipment_name" type="text" name="equipment_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="equipment_description_id" class="form-label">Description</label>
                <select name="equipment_description_id" id="equipment_description_id" class="form-input">
                    @foreach ($equipmentDescriptions as $equipmentDescription)
                        <option value="{{ $equipmentDescription->id }}">{{ $equipmentDescription->content }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field-container">
                <label for="equipment_type_id" class="form-label">Equipment Type</label>

                <select name="equipment_type_id" id="equipment_type_id" class="form-input">
                    @foreach ($equipmentTypes as $equipmentType)
                        <option value="{{ $equipmentType->id }}">{{ $equipmentType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="available" class="form-label">Quantity (Available)</label>
                    <input id="available" class="form-input" type="number" name="available" min="0" placeholder="0">
                </div>

                <div class="form-field-container">
                    <label for="not_available" class="form-label">Quantity (Not Available)</label>
                    <input id="not_available" class="form-input" type="number" name="not_available" min="0"
                        placeholder="0">
                </div>

                <div class="form-field-container">
                    <label for="under_maintenance" class="form-label">Quantity (Under Maintenance)</label>
                    <input id="under_maintenance" class="form-input" type="number" name="under_maintenance" min="0"
                        placeholder="0">
                </div>
            </div>

            <label for="image" class="form-input flex items-center justify-center cursor-pointer hover:bg-border">
                <svg class="w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 3c.3 0 .6.1.8.4l4 5a1 1 0 1 1-1.6 1.2L13 7v7a1 1 0 1 1-2 0V6.9L8.8 9.6a1 1 0 1 1-1.6-1.2l4-5c.2-.3.5-.4.8-.4ZM9 14v-1H5a2 2 0 0 0-2 2v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                        clip-rule="evenodd" />
                </svg>&nbsp;Upload Image
                <input id="image" name="image" type="file" class="hidden max-h-0 max-w-0">
            </label>

            <div class="self-end flex gap-2">
                <a href="{{ route('equipment.index') }}" class="outline-button">
                    Cancel
                </a>
                <button class="primary-button">Add Equipment</button>
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
