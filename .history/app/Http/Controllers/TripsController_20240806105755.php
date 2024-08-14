<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Destination;
use App\Models\Cost_Tabulator;
use App\Models\User;

class TripsController extends Controller
{
    public function view()
    {
        return view('adminFold.trips');
    }

    public function getTrips(Request $request)
{
    try {
        $order = $request->query('order', 'asc'); 

        $trips = Trip::with(['destination', 'cost_tabulator', 'user'])
            ->orderBy('idtrips', $order)
            ->get(); 

        return response()->json($trips); 
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    public function getTrip($idtrips)
    {
        $trip = Trip::find($idtrips);
        return response()->json($trip);
    }

    public function insertTrip(Request $request)
{
    $validated = $request->validate([
        'iddestinations' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'duration' => 'required|integer',
        'idcost_tabulators' => 'required|integer',
        'idusers' => 'required|integer'
    ]);

    $trip = new Trip;
    $trip->destinations_iddestinations = $validated['iddestinations'];
    $trip->start_date = $validated['start_date'];
    $trip->end_date = $validated['end_date'];
    $trip->duration = $validated['duration'];
    $trip->cost_tabulators_idcost_tabulators = $validated['idcost_tabulators'];
    $trip->users_idusers = $validated['idusers'];
    $trip->save();

    return response()->json($trip);
}


public function updateTrip(Request $request, $idtrips)
{
    $trip = Trip::find($idtrips);
    $trip->destinations_iddestinations = $request->iddestinations;
    $trip->start_date = $request->start_date;
    $trip->end_date = $request->end_date;
    $trip->duration = $request->duration;
    $trip->cost_tabulators_idcost_tabulators = $request->idcost_tabulators;
    $trip->users_idusers = $request->idusers;
    $trip->save();
    return response()->json($trip);
}


    public function deleteTrip($idtrips)
    {
        $trip = Trip::find($idtrips);
        $trip->delete();
        return response()->json(['message' => 'Unidad eliminada correctamente']);
    }
    
    public function getDestinations()
    {
        $destinations = Destination::all();
        return response()->json($destinations);
    }
    
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getCost_Tabulators()
    {
        $cost_tabulators = Cost_Tabulator::all();
        return response()->json($cost_tabulators);

        $trips = Trip::with(['destination', 'costTabulator', 'user'])
            ->orderBy('idtrips', $order)
            ->get(); 

        return response()->json($trips); 
    } 

    public function getTrip($idtrips)
{
    $trip = Trip::find($idtrips);
    if (!$trip) {
        return response()->json(['error' => 'Trip not found'], 404);
    }
    return response()->json($trip);
}

    public function insertTrip(Request $request)
{
    $validated = $request->validate([
        'iddestinations' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'duration' => 'required|string|max:60', 
        'idcost_tabulators' => 'required|integer',
        'idusers' => 'required|integer',
        'idcontracts' => 'nullable|integer', 
    ]);

    $trip = new Trip;
    $trip->destinations_iddestinations = $validated['iddestinations'];
    $trip->start_date = $validated['start_date'];
    $trip->end_date = $validated['end_date'];
    $trip->duration = $validated['duration'];
    $trip->cost_tabulators_idcost_tabulators = $validated['idcost_tabulators'];
    $trip->users_id = $validated['idusers'];
    $trip->contracts_idcontracts = $validated['idcontracts'] ?? null; 
    $trip->save();

    return response()->json($trip);
}

public function updateTrip(Request $request, $idtrips)
{
    $validated = $request->validate([
        'iddestinations' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'duration' => 'required|string|max:60', 
        'idcost_tabulators' => 'required|integer',
        'idusers' => 'required|integer',
        'idcontracts' => 'nullable|integer', 
    ]);

    $trip = Trip::find($idtrips);
    if (!$trip) {
        return response()->json(['error' => 'Trip not found'], 404);
    }
    $trip->destinations_iddestinations = $validated['iddestinations'];
    $trip->start_date = $validated['start_date'];
    $trip->end_date = $validated['end_date'];
    $trip->duration = $validated['duration'];
    $trip->cost_tabulators_idcost_tabulators = $validated['idcost_tabulators'];
    $trip->users_id = $validated['idusers'];
    $trip->contracts_idcontracts = $validated['idcontracts'] ?? null; 
    $trip->save();

    return response()->json($trip);
}


public function deleteTrip($idtrips)
{
    $trip = Trip::find($idtrips);
    if (!$trip) {
        return response()->json(['error' => 'Trip not found'], 404);
    }
    $trip->delete();
    return response()->json(['message' => 'Unidad eliminada correctamente']);
}
    
    public function getDestinations()
    {
        $destinations = Destination::all();
        return response()->json($destinations);
    }
    
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getCost_Tabulators()
    {
        $cost_tabulators = Cost_Tabulator::all();
        return response()->json($cost_tabulators);
    }
}
    
