<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;

class CitiesController extends Controller
{
    public function view()
    {
        return view('adminFold.cities');
    }

    public function getCities(Request $request)
    {
        $order = $request->query('order', 'asc');
        $cities = City::with('state')->orderBy('idcities', $order)->get();
        return response()->json($cities);
    }

    public function getCity($id)
    {
        $city = City::with('state')->where('idcities', $id)->first();
        return response()->json($city);
    }

    public function insertCity(Request $request)
    {
        $city = new City;
        $city->name = $request->name;
        $city->states_idstates = $request->idstates;
        $city->save();
        return response()->json($city);
    }

    public function updateCity(Request $request, $idcities)
    {
        $city = City::find($idcities);
        $city->name = $request->name;
        $city->states_idstates = $request->idstates;
        $city->save();
        return response()->json($city);
    }

    public function deleteCity($idcities)
    {
        $city = City::find($idcities);
        if ($city) {
            $city->delete();
            return response()->json(['message' => 'Ciudad eliminada correctamente']);
        } else {
            return response()->json(['message' => 'Ciudad no encontrada'], 404);
        }
    }

    public function getStates()
    {
        $states = State::all();
        return response()->json($states);
    }
}
