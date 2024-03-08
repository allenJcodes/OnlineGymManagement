@extends('layouts.app')

@section('content')
    <div class="container pt-12">
        <div class="pt-2 pb-12">
            <a href="{{ route('equipment.index') }}" class="">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</button>
            </a>
        </div>
        <div class="flex flex-col pt-14 gap-8">

            <h1 class="text-xl">Add Equipment</h1>


            <form enctype="multipart/form-data" action="{{ route('equipment.store') }}" method="POST" class="flex flex-col gap-3">
                @csrf

                <div class="form-field-container">
                    <label for="equipment_name" class="form-label">Equipment Name</label>
                    <input id="equipment_name" type="text" name="equipment_name" class="form-input">
                </div>

                <div class="form-field-container">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="text" name="description" class="form-input">
                </div>

                <div class="form-field-container">
                    <label for="equipment_type_id" class="form-label">Equipment Type</label>
                
                    <select name="equipment_type_id" id="equipment_type_id" class="form-input">
                        @foreach ($equipmentTypes as $equipmentType)
                            <option value="{{ $equipmentType->id }}">{{ $equipmentType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-field-container">
                    <label for="status" class="form-label">Status</label>
                
                    <select name="status" id="status" class="form-input">
                        <option value="" selected disabled>Select status</option>
                        <option value="available">Available</option>
                        <option value="not_available">Not Available</option>
                        <option value="under_maintenance">Under Maintenance</option>
                    </select>
                </div>
    

                <div class="form-field-container">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="text" name="description" class="form-input">
                </div>

                <label for="image" class="form-input flex items-center justify-center cursor-pointer hover:bg-border">
                    Upload Image

                    <input id="image" name="image" type="file" class="hidden max-h-0 max-w-0">
                </label>

                <button>Add Equipment</button>
            </form>

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



    </div>
@endsection
