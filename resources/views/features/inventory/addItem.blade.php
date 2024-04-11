@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5 text-background">

        <h1 class="text-2xl font-bold">Add Item</h1>

        <form action="{{ route('inventory.store') }}" method="POST" class="flex flex-col gap-3 card">
            @csrf

            <div class="form-field-container">
                <label for="equipment_id" class="form-label">Item Name</label>
                <select name="equipment_id" id="equipment_id" class="form-input">
                    <option value="" selected disabled>Select Equipment</option>
                    @foreach ($equipments as $equipment)
                        <option value="{{ $equipment->id }}">{{ $equipment->equipment_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="equipment_type_id" class="form-label">Equipment Type</label>
                    <select name="equipment_type_id" id="equipment_type_id" class="form-input">
                        <option value="" selected disabled></option>
                        @foreach ($equipmentTypes as $equipmentType)
                            <option value="{{ $equipmentType->id }}" disabled>{{ $equipmentType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-field-container">
                    <label for="purchase_date" class="form-label">Purchase Date</label>
                    <input id="purchase_date" type="date" name="purchase_date" class="form-input">
                </div>
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="warranty_information" class="form-label">Warranty Information</label>
                    <input id="warranty_information" type="text" name="warranty_information" class="form-input">
                </div>
                <div class="form-field-container">
                    <label for="maintenance_history" class="form-label">Maintenance History</label>
                    <select name="maintenance_history" id="maintenance_history" class="form-input">
                        <option value="" selected disabled>Select Maintenance History</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="annually">Annually</option>
                    </select>
                </div>
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('inventory.index') }}" class="outline-button">
                    Cancel
                </a>
                
                <button type="submit" class="primary-button">
                    Add Item
                </button>
            </div>

            
        </form>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <script>
          // Load Equipment Type when Item Name is changed
          $('#equipment_id').on('change', function(e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                url: '{{ route('getItemType') }}',
                method: 'get',
                data: {
                    'id': id
                },
                success: function(res) {
                    $("#equipment_type_id").val(res.equipment_type_id);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
@endsection
