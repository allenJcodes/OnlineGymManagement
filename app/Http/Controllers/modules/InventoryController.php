<?php

namespace App\Http\Controllers\modules;

use App\Models\Equipment;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\EquipmentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\InventoryStoreRequest;
use App\Http\Requests\Inventory\InventoryUpdateRequest;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('equipment')->paginate(2);
        return view('features.inventory.inventory', compact('inventories'));
    }

    public function create() {
        $equipmentTypes = EquipmentType::all();
        $equipments = Equipment::all();
        return view('features.inventory.addItem', compact('equipmentTypes', 'equipments'));
    }

    public function store(InventoryStoreRequest $request) {
        Inventory::create($request->validated());
        return redirect()->route('inventory.index');
    }

    public function edit(Inventory $inventory) {
        $equipmentTypes = EquipmentType::all();
        return view('features.inventory.editItem', compact('inventory', 'equipmentTypes'));
    }

    public function update(InventoryUpdateRequest $request, Inventory $inventory) {
        $inventory->update($request->validated());
        return redirect()->route('inventory.edit', ['inventory' => $inventory]);
    }

    public function destroy(Inventory $inventory) {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }

    public function getItemType(Request $request)
    {
        $id = $request['id'] ?? "";
        $query = $id ? Equipment::find($id) : null;
        return response()->json($query);
    }

}