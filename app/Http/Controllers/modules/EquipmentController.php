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
            $newImageName = time() . '-' . $request->equipment_name . '.';
            $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
        }

        Equipment::create([...$request->validated(), 'image_path' => $newImageName ?? '']);

        return redirect()->route('equipment.index');
    }

    public function edit() {
        
    }

    public function update() {
        
    }

    public function destroy() {
        
    }

    public function AddEquipment()
    {
        $equipmentType = EquipmentType::all();
        return view('features.equipment.AddEquipment', [ 
            'types' => $equipmentType
        ]);
    }

    public function CreateEquipment(EquipmentStoreRequest $request)
    {
        $validatedData = $request->validated();

        $newImageName = time() . '-' . $validatedData['equipment_name'] . '.' .
            $request->image->extension();

        $request->image->move(public_path('image/equipment'), $newImageName);

        DB::table('equipment')->insert([
            'equipment_name' => $validatedData['equipment_name'],
            'description' => $validatedData['description'],
            'equipment_type_id' => $validatedData['equipment_type_id'],
            'status' => $validatedData['status'],
            'image_path' => $newImageName,
        ]);

        return redirect('/equipment');
    }

    public function editEquipment($id)
    {
        $equipment = DB::table('equipment')
            ->where('id', $id)
            ->first();
        $equipmentType = EquipmentType::all();
        
        return view('features.equipment.editEquipment', [
            'equipment' => $equipment,
            'types' => $equipmentType
        ]);
    }

    public function updateEquipment(EquipmentUpdateRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->equipment_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
        }

        $data = [
            'equipment_name' => $request->equipment_name,
            'description' => $request->description,
            'equipment_type_id' => $request->equipment_type_id,
            'status' => $request->status,
        ];

        if (isset($newImageName)) {
            $data['image_path'] = $newImageName;
        }

        DB::table('equipment')->where('id', $id)->update($data);

        return redirect('/equipment');
    }

    public function deleteEquipment(Request $request)
    {
        DB::table('equipment')
            ->where('id', $request->id)
            ->delete();

        return redirect('/equipment');
    }
}
