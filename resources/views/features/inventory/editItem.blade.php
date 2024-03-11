@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5">

        <h1 class="text-2xl font-bold">Edit Item</h1>

        <form action="{{ route('inventory.update', ['inventory' => $inventory]) }}" method="POST" class="flex flex-col gap-3 card">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="equipment_id" class="form-label">Item Name</label>
                <input value="{{$inventory->equipment->equipment_name}}" id="equipment_id" type="text" name="equipment_id" class="form-input" readonly>
            </div>

            <div class="form-field-container">
                <label for="quantity" class="form-label">Quantity</label>
                <input value="{{$inventory->quantity}}" id="quantity" type="number" min="0" name="quantity" class="form-input">
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="equipment_type_id" class="form-label">Equipment Type</label>
                    <input value="{{$inventory->equipment->equipmentType->name}}" id="equipment_type_id" type="text" name="equipment_type_id" class="form-input" readonly>
                </div>
                <div class="form-field-container">
                    <label for="purchase_date" class="form-label">Purchase Date</label>
                    <input value="{{$inventory->purchase_date}}" id="purchase_date" type="date" name="purchase_date" class="form-input">
                </div>
            </div>

            <div class="flex gap-3 w-full">
                <div class="form-field-container">
                    <label for="warranty_information" class="form-label">Warranty Information</label>
                    <input value="{{$inventory->warranty_information}}" id="warranty_information" type="text" name="warranty_information" class="form-input">
                </div>
                <div class="form-field-container">
                    <label for="maintenance_history" class="form-label">Maintenance History</label>

                    <select name="maintenance_history" id="maintenance_history" class="form-input">
                        <option {{$inventory->maintenance_history == '' ? 'selected' : ''}} value="" disabled>Select Maintenance History</option>
                        <option {{$inventory->maintenance_history == 'monthly' ? 'selected' : ''}} value="monthly">Monthly</option>
                        <option {{$inventory->maintenance_history == 'quarterly' ? 'selected' : ''}} value="quarterly">Quarterly</option>
                        <option {{$inventory->maintenance_history == 'annually' ? 'selected' : ''}} value="annually">Annually</option>
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
                    Back
                </a>
                <button type="submit" class="primary-button">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
