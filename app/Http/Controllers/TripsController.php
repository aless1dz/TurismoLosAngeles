<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripsController extends Controller
{
    public function view()
    {
        return view('adminFold.trips');
    }

    public function getTrips(Request $request)
    {
        $order = $request->query('order', 'asc');
        $trips = Trip::with('state', 'city')->orderBy('idtrips', $order)->get();
        return response()->json($trips);
    }

    public function getTrip($id)
    {
        $trip = Trip::with('state', 'city')->where('idtrips', $id)->first();
        return response()->json($trip);
    }

    public function insertTrip(Request $request)
    {
        $trip = new Trip;
        $trip->start_date = $request->start_date;
        $trip->end_date = $request->end_date;
        $trip->states_idstates = $request->idstates; 
        $trip->save();
        return response()->json($trip);
    }

    public function updateCity(Request $request, $idcities)
    {
        $trip = Trip::find($idcities);
        $trip->name = $request->name;
        $trip->states_idstates = $request->idstates; 
        $trip->save();
        return response()->json($trip);
    }

    public function deleteCity($idcities)
    {
        $trip = Trip::find($idcities);
        $trip->delete();
        return response()->json(['message' => 'Ciudad eliminada correctamente']);
    }

    public function getStates()
    {
        $states = State::all();
        return response()->json($states);
    }
}
