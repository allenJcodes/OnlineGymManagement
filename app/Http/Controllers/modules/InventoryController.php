<?php

namespace App\Http\Controllers\modules;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\EquipmentType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\InventoryStoreRequest;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::paginate(2);
        return view('features.inventory.inventory', compact('inventories'));
    }

    public function create() {
        $equipmentTypes = EquipmentType::all();
        return view('features.inventory.addItem', compact('equipmentTypes'));
    }

    public function store(InventoryStoreRequest $request) {
        Inventory::create($request->validated());
        return redirect()->route('inventory.index');
    }

    public function edit(Inventory $inventory) {
        $equipmentTypes = EquipmentType::all();
        return view('features.inventory.editItem', compact('inventory', 'equipmentTypes'));
    }

    public function update(InventoryStoreRequest $request, Inventory $inventory) {
        $inventory->update($request->validated());
        return redirect()->route('inventory.edit', ['inventory' => $inventory]);
    }

    public function destroy(Inventory $inventory) {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }

}