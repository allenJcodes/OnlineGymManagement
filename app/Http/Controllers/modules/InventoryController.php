<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index()
    {
        $item = DB::table('inventory')
            ->get();
        return view('features.inventory.inventory', [
            'item' => $item,
        ]);
    }

    public function addItem()
    {
        return view('features.inventory.addItem');
    }

    public function createItem(Request $request)
    {
        DB::table('inventory')->insert([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'equipment_type' => $request->equipment_type,
            'purchase_date' => $request->purchase_date,
            'warranty_information' => $request->warranty_information,
            'maintenance_history' => $request->maintenance_history,
            'status' => $request->status,
        ]);

        return redirect('/inventory');
    }

    public function editItem($id)
    {
        $item = DB::table('inventory')
            ->where('id', $id)
            ->first();

        return view('features.inventory.editItem', [
            'item' => $item,
        ]);
    }


    public function updateItem(Request $request, $id)
    {

        $item = DB::table('inventory')
            ->where('id', $id)
            ->update([

                'item_name' => $request->item_name,
                'quantity' => $request->quantity,
                'equipment_type' => $request->equipment_type,
                'purchase_date' => $request->purchase_date,
                'warranty_information' => $request->warranty_information,
                'maintenance_history' => $request->maintenance_history,
                'status' => $request->status,
            ]);



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