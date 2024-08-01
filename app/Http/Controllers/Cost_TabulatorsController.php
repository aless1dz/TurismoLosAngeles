<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost_Tabulator;
use App\Models\Destination;

class Cost_TabulatorsController extends Controller
{
    public function view()
    {
        return view('adminFold.costTabulator');
    }

    public function getCost_Tabulators(Request $request)
    {
    try {
        $order = $request->query('order', 'asc');
        $cost_tabulators = Cost_Tabulator::with('destination')->orderBy('idcost_tabulators', $order)->get();
        return response()->json($cost_tabulators);
    } 
    catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }


    public function getCost_Tabulator($id)
    {
        $cost_tabulator = Cost_Tabulator::with('state')->where('idcost_tabulators', $id)->first();
        return response()->json($cost_tabulator);
    }

    public function insertCost_Tabulator(Request $request)
{
    $request->validate([
        'iddestinations' => 'required|exists:destinations,iddestinations',
        'unit_price' => 'required|numeric',
        'bulk_price' => 'required|numeric',
        'description' => 'nullable|string'
    ]);

    try {
        $cost_tabulator = new Cost_Tabulator;
        $cost_tabulator->destinations_iddestinations = $request->iddestinations;
        $cost_tabulator->unit_price = $request->unit_price;
        $cost_tabulator->bulk_price = $request->bulk_price;
        $cost_tabulator->description = $request->description;
        $cost_tabulator->save();
        return response()->json($cost_tabulator);
    } catch (\Exception $e) {
        // Registra el error para depuración
        \Log::error('Error al insertar Cost_Tabulator: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
    public function updateCost_Tabulator(Request $request, $idcost_tabulators)
    {
        $cost_tabulator = Cost_Tabulator::find($idcost_tabulators);
        $cost_tabulator->destinations_iddestinations = $request->iddestinations;
        $cost_tabulator->unit_price = $request->unit_price;
        $cost_tabulator->bulk_price = $request->bulk_price;
        $cost_tabulator->description = $request->description;
        $cost_tabulator->save();
        return response()->json($cost_tabulator);
    }

    public function deleteCost_Tabulator($idcost_tabulators)
    {
        $cost_tabulator = Cost_Tabulator::find($idcost_tabulators);
        $cost_tabulator->delete();
        return response()->json(['message' => 'Columna eliminada correctamente']);
    }

    public function getDestinations()
    {
        $destinations = Destination::all();
        return response()->json($destinations);
    }
}
