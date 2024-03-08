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
        $item = Inventory::all();

        return view('features.inventory.inventory', compact('item'));
    }

    public function addItem()
    {
        $equipmentType = EquipmentType::all();

        return view('features.inventory.addItem', [
            'types' => $equipmentType
        ]);
    }

    public function createItem(InventoryStoreRequest $request)
    {
        Inventory::create($request->validated());

        return redirect('/inventory');
    }

    public function editItem($id)
    {
        $item = Inventory::find($id);
        $equipmentType = EquipmentType::all();

        return view('features.inventory.editItem', [
            'item' => $item,
            'types' => $equipmentType
        ]);
    }

    public function updateItem(InventoryStoreRequest $request, $id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            abort(404, 'Inventory item not found');
        } else {
            $inventory->update($request->validated());
        }

        return redirect('/inventory');
    }

    public function deleteItem(Request $request)
    {
        DB::table('inventory')
            ->where('id', $request->id)
            ->delete();

        return redirect('/inventory');
    }
}