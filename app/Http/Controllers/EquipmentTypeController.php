<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Http\Requests\EquipmentType\EquipmentTypeStoreRequest;
use App\Http\Requests\EquipmentType\EquipmentTypeUpdateRequest;

class EquipmentTypeController extends Controller
{
    public function __construct() {
       $this->authorizeResource(EquipmentType::class, 'equipment_type'); 
    }

    public function index()
    {
        $model = EquipmentType::search()->paginate(10);
        return view('features.equipment_types.EquipmentTypes', compact('model'));
    }

    public function create()
    {
        return view('features.equipment_types.AddEquipmentType');
    }

    public function store(EquipmentTypeStoreRequest $request)
    {
        EquipmentType::create($request->validated());

        return redirect()->route('equipment_types.index')->with('toast', [
            'status' => 'success',
            'message' => 'Equipment Type added successfully.',
        ]);
    }

    public function edit(EquipmentType $equipmentType)
    {
        return view('features.equipment_types.EditEquipmentType', ['equipment_type' => $equipmentType]);
    }

    public function update(EquipmentTypeUpdateRequest $request, EquipmentType $equipmentType)
    {
        $equipmentType->update($request->validated());

        return redirect()->route('equipment_types.edit', ['equipment_type' => $equipmentType])->with('toast', [
            'status' => 'success',
            'message' => 'Equipment Type updated successfully.',
        ]);
    }

    public function destroy(EquipmentType $equipmentType)
    {
        $equipmentType->delete();
        return redirect()->route('equipment_types.index')->with('toast', [
            'status' => 'success',
            'message' => 'Equipment Type deleted successfully.',
        ]);
    }
}
