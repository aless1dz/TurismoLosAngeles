<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\City;
use App\Models\State;

class DestinationsController extends Controller
{
    public function view()
    {
        return view('adminFold.destinations');
    }

    public function getDestinations(Request $request)
    {
        $order = $request->query('order', 'asc');
        $destinations = Destination::with('city', 'state')->orderBy('iddestinations', $order)->get();
        return response()->json($destinations);
    }

    public function getDestination($id)
    {
        $destination = Destination::with('city', 'state')->where('iddestinations', $id)->first();
        return response()->json($destination);
    }

    public function insertDestination(Request $request)
    {
        $destination = new Destination;
        $destination->destination_acronym = $request->destination_acronym;
        $destination->cities_idcities = $request->idcities;
        $destination->states_idstates = $request->idstates;
        $destination->save();
        return response()->json($destination);
    }

    public function updateDestination(Request $request, $iddestinations)
    {
        $destination = Destination::find($iddestinations);
        $destination->destination_acronym = $request->destination_acronym;
        $destination->cities_idcities = $request->idcities;
        $destination->states_idstates = $request->idstates;
        $destination->save();
        return response()->json($destination);
    }

    public function deleteDestination($iddestinations)
    {
        $destination = Destination::find($iddestinations);
        $destination->delete();
        return response()->json(['message' => 'Destino eliminado correctamente']);
    }

    public function getCities()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function getStates()
    {
        $states = State::all();
        return response()->json($states);
    }
}
