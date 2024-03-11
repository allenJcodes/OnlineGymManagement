@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5 text-background">

        <h1 class="text-2xl font-bold">Add Item</h1>

        <form action="{{ route('inventory.store') }}" method="POST" class="flex flex-col gap-3 card">
            @csrf

            <div class="form-field-container">
                <label for="item_name" class="form-label">Item Name</label>
                <input id="item_name" type="text" name="item_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="quantity" class="form-label">Quantity</label>
                <input id="quantity" type="text" name="quantity" class="form-input">
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="equipment_type_id" class="form-label">Equipment Type</label>
                
                    <select name="equipment_type_id" id="equipment_type_id" class="form-input">
                        @foreach ($equipmentTypes as $equipmentType)
                            <option value="{{ $equipmentType->id }}">{{ $equipmentType->name }}</option>
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
                    <input id="maintenance_history" type="text" name="maintenance_history" class="form-input">
                </div>
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
@endsection
