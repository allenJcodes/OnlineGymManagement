<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        return view('features.equipment.equipment');
    }

    public function AddEquipment()
    {
        return view('features.equipment.AddEquipment');
    }
}
