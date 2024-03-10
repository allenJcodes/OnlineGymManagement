<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\EquipmentStoreRequest;
use App\Http\Requests\Equipment\EquipmentUpdateRequest;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EquipmentType;

class EquipmentController extends Controller
{

    public function index()
    {
        $equipments = Equipment::get();
        return view('features.equipment.equipment', compact('equipments'));
    }

    public function create() {
        $equipmentTypes = EquipmentType::all();
        return view('features.equipment.AddEquipment', compact('equipmentTypes'));
    }

    public function store(EquipmentStoreRequest $request) {
        if($request->image){
            $newImageName = time() . '-' . $request->equipment_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
        }

        Equipment::create([...$request->validated(), 'image_path' => $newImageName ?? '']);

        return redirect()->route('equipment.index');
    }

    public function edit(Equipment $equipment) {
        $equipmentTypes = EquipmentType::all();
        return view('features.equipment.editEquipment', compact('equipment', 'equipmentTypes'));
    }

    public function update(EquipmentUpdateRequest $request, Equipment $equipment) {
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->equipment_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
        }


        $equipment->update([...$request->validated(), 'image_path' => $newImageName ?? '']);

        return redirect()->route('equipment.edit', ['equipment' => $equipment]);
    }

    public function deleteEquipment(Request $request)
    {
        DB::table('equipment')
            ->where('id', $request->id)
            ->delete();

        return redirect('/equipment');
    }
}
