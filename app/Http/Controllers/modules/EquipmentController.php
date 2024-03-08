<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\EquipmentStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Equipment;
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

    public function CreateEquipment(Request $request)

    {
        // dd($request->all());
        // $request->validate([
        //     'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        // ]);

        $newImageName = time() . '-' . $request->equipment_name . '.' .
            $request->image->extension();
        $request->image->move(public_path('image/equipment'), $newImageName);

        // dd($newImageName);
        DB::table('equipment')
            ->insert([
                // 'id' => $request->id,
                'equipment_name' => $request->equipment_name,
                'description' => $request->description,
                'equipment_type_id' => $request->equipment_type,
                'status' => $request->status,
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

    public function updateEquipment(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->equipment_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/equipment'), $newImageName);
            $equipment = DB::table('equipment')
                ->where('id', $id)
                ->update([

                    'equipment_name' => $request->equipment_name,
                    'description' => $request->description,
                    'equipment_type_id' => $request->equipment_type,
                    'status' => $request->status,
                    'image_path' => $newImageName,
                ]);
        } else {
            $equipment = DB::table('equipment')
                ->where('id', $id)
                ->update([
                    // 'image' => $request->image,
                    'equipment_name' => $request->equipment_name,
                    'description' => $request->description,
                    'equipment_type_id' => $request->equipment_type,
                    'status' => $request->status,
                ]);
        }

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
