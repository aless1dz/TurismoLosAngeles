<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Destination;
use App\Models\Cost_Tabulator;
use App\Models\User;
use App\Models\Associate;

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
        $trips = Trip::with(['destination', 'costTabulator', 'user', 'associate', 'associates'])->orderBy('idtrips', $order)->get();
        return response()->json($trips);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
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
        'idusers' => 'required|integer',
        'idassociates' => 'required|array',
        'idcost_tabulators' => 'required|integer',
        'bus_seats' => 'required|numeric',
        'telephone_number' => 'required|numeric',
        'payment_advance' => 'required|numeric',
        'total' => 'required|numeric',
        'observations' => 'required|string|max:60',
    ]);

    $trip = new Trip;
    $trip->destinations_iddestinations = $validated['iddestinations'];
    $trip->users_id = $validated['idusers'];
    $trip->cost_tabulators_idcost_tabulators = $validated['idcost_tabulators'];
    $trip->bus_seats = $validated['bus_seats'];
    $trip->telephone_number = $validated['telephone_number'];
    $trip->payment_advance = $validated['payment_advance'];
    $trip->total = $validated['total'];
    $trip->observations = $validated['observations'];
    $trip->save();

    // Sincronizar los acompañantes seleccionados con el viaje
    $trip->associates()->sync($validated['idassociates']);

    return response()->json($trip);
}

public function updateTrip(Request $request, $idtrips)
{
    $validated = $request->validate([
        'iddestinations' => 'required|integer',
        'idusers' => 'required|integer',
        'idassociates' => 'required|array',
        'idcost_tabulators' => 'required|integer',
        'bus_seats' => 'numeric',
        'telephone_number' => 'required|numeric',
        'payment_advance' => 'required|numeric',
        'total' => 'numeric',
        'observations' => 'required|string|max:60',
    ]);

    $trip = Trip::find($idtrips);
    if (!$trip) {
        return response()->json(['error' => 'Trip not found'], 404);
    }

    $trip->destinations_iddestinations = $validated['iddestinations'];
    $trip->users_id = $validated['idusers'];
    $trip->cost_tabulators_idcost_tabulators = $validated['idcost_tabulators'];
    $trip->bus_seats = $validated['bus_seats'];
    $trip->telephone_number = $validated['telephone_number'];
    $trip->payment_advance = $validated['payment_advance'];
    $trip->total = $validated['total'];
    $trip->observations = $validated['observations'];
    $trip->save();

    // Sincronizar los acompañantes seleccionados con el viaje
    $trip->associates()->sync($validated['idassociates']);

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

    public function getAssociates()
    {
        $associates = Associate::all();
        return response()->json($associates);
    }
}