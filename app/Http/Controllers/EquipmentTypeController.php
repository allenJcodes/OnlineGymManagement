<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentType;
use App\Http\Requests\EquipmentType\EquipmentTypeStoreRequest;

class EquipmentTypeController extends Controller
{
    public function index()
    {
        $model = EquipmentType::paginate(10);
        return view('features.equipment_types.EquipmentTypes', compact('model'));
    }

    public function create()
    {
        return view('features.equipment_types.AddEquipmentType');
    }

    public function store(EquipmentTypeStoreRequest $request)
    {
        EquipmentType::create($request->validated());

        return redirect()->route('equipment_types.index');
    }

    public function edit(EquipmentType $equipmentType)
    {
        return view('features.equipment_types.EditEquipmentType', ['equipment_type' => $equipmentType]);
    }

    public function update(EquipmentTypeStoreRequest $request, EquipmentType $equipmentType)
    {
        $equipmentType->update($request->validated());

        return redirect()->route('equipment_types.edit', ['equipment_type' => $equipmentType]);
    }

    public function destroy(EquipmentType $equipmentType)
    {
        $equipmentType->delete();
        return redirect()->route('equipment_types.index');
    }

}
