<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitsController extends Controller
{
    public function view()
{
    // Obtener todas las unidades
    $units = Unit::all();

    // Pasar la variable $units a la vista
    return view('adminFold.unidades', compact('units'));
}


    public function getUnits(Request $request)
    {
        try {
            $order = $request->query('order', 'asc'); // Obtener el parámetro de orden, por defecto 'asc'
            $units = Unit::orderBy('idunits', $order)->get(); // Obtener las unidades ordenadas

            return response()->json($units); // Devolver las unidades en formato JSON
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    public function getUnit($idunits)
    {
        $unit = Unit::find($idunits);
        return response()->json($unit);
    }

    public function insertUnit(Request $request)
    {
        $unit = new Unit;
        $unit->model = $request->model;
        $unit->manufacturer = $request->manufacturer;
        $unit->plate = $request->plate;
        $unit->place = $request->place;
        $unit->save();
        return response()->json($unit);
    }

    // public function updateUnit(Request $request, $idunits)
    // {
    //     $unit = Unit::find($idunits);
    //     $unit->model = $request->model;
    //     $unit->manufacturer = $request->manufacturer;
    //     $unit->plate = $request->plate;
    //     $unit->place = $request->place;
    //     $unit->save();
    //     return response()->json($unit);
    // }

    public function deleteUnit($idunits)
    {
        $unit = Unit::find($idunits);
        $unit->delete();
        return response()->json(['message' => 'Unidad eliminada correctamente']);
    }
    public function updateUnit(Request $request, $id)
{
    $unit = Unit::findOrFail($id);
    $unit->model = $request->input('model');
    $unit->manufacturer = $request->input('manufacturer');
    $unit->plate = $request->input('plate');
    $unit->place = $request->input('place');
    $unit->save();

    return redirect()->back()->with('success', 'Unidad actualizada correctamente.');
}

// public function updateUnitStatus(Request $request, $id)
// {
//     $unit = Unit::findOrFail($id);
//     $unit->state_form = $request->input('state_form');
//     $unit->save();

//     return redirect()->back()->with('success', 'Estado de la unidad actualizado correctamente.');
// }


}
