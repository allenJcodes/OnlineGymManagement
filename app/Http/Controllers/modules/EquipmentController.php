<?php

namespace App\Http\Controllers\modules;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Models\EquipmentType;
use App\Models\EquipmentStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\EquipmentDescription;
use App\Http\Requests\Equipment\EquipmentStoreRequest;
use App\Http\Requests\Equipment\EquipmentUpdateRequest;

class EquipmentController extends Controller
{

    public function index()
    {
        $equipments = Equipment::with('equipmentStatus')->get();
        return view('features.equipment.equipment', compact('equipments'));
    }

    public function create() {
        $equipmentTypes = EquipmentType::all();
        $equipmentDescriptions = EquipmentDescription::all();
        return view('features.equipment.AddEquipment', compact('equipmentTypes', 'equipmentDescriptions'));
    }

    public function store(EquipmentStoreRequest $request) {
        if($request->image){
            $newImageName = time() . '-' . $request->equipment_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
        }

        $equipment = Equipment::create([...$request->validated(), 'image_path' => $newImageName ?? '']);

        // Create equipment statuses record
        $statuses = ['available', 'not_available', 'under_maintenance'];

        foreach ($statuses as $status) {
            $quantity = isset($request->$status) ? $request->$status : 0;
            EquipmentStatus::create([
                'equipment_id' => $equipment->id,
                'status' => $status,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('equipment.index')->with('toast', [
            'status' => 'success',
            'message' => 'Equipment added successfully.',
        ]);
    }

    public function edit(Equipment $equipment) {
        $equipmentTypes = EquipmentType::all();
        $equipmentDescriptions = EquipmentDescription::all();
        return view('features.equipment.editEquipment', compact('equipment', 'equipmentTypes', 'equipmentDescriptions'));
    }

    public function update(EquipmentUpdateRequest $request, Equipment $equipment) {
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->equipment_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
        } else {
            $newImageName = $equipment->image_path;
        }

        $equipment->update([...$request->validated(), 'image_path' => $newImageName]);
        
        $filteredStatuses = $request->only('available', 'not_available', 'under_maintenance'); 
        $equipmentStatuses = EquipmentStatus::where('equipment_id', $equipment->id)->get();
        
        foreach ($filteredStatuses as $status => $quantity) {
            $matchingStatus = $equipmentStatuses->where('status', $status)->first();
            $matchingStatus->update(['quantity' => $quantity ?? 0]);
        }
        
        return redirect()->route('equipment.edit', ['equipment' => $equipment])->with('toast', [
            'status' => 'success',
            'message' => 'Equipment updated successfully.',
        ]);
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return back()->with('toast', [
            'status' => 'success',
            'message' => 'Equipment deleted successfully.',
        ]);
    }

    public function restore() {
        $equipment = Equipment::withTrashed()->find(request()->equipment_id);
        $equipmentStatus = EquipmentStatus::withTrashed()->where('equipment_id', '=', $equipment->id)->restore();
        $equipment->restore();

        return back()->with('toast', [
            'status' => 'success',
            'message' => 'Equipment restored successfully.',
        ]);
    }
}
