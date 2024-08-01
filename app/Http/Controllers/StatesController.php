<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StatesController extends Controller
{
    public function view()
    {
        return view('adminFold.states');
    }

    public function getStates(Request $request)
    {
        $order = $request->query('order', 'asc');
        $states = State::orderBy('idstates', $order)->get();
        return response()->json($states);
    }

    public function getState($id)
    {
        $state = State::find($id);
        return response()->json($state);
    }

    public function insertState(Request $request)
    {
        $state = new State;
        $state->name = $request->name;
        $state->country = $request->country; 
        $state->save();
        return response()->json($state);
    }

    public function updateState(Request $request, $id)
    {
        $state = State::find($id);
        $state->name = $request->name;
        $state->country = $request->country; 
        $state->save();
        return response()->json($state);
    }

    public function deleteState($id)
    {
        $state = State::find($id);
        $state->delete();
        return response()->json(['message' => 'Estado eliminado correctamente']);
    }
}

    // public function view()
    // {
    //     return view('adminFold.states');
    // }

    // public function getStates(Request $request)
    // {
    //     $order = $request->query('order', 'asc');
    //     $states = State::orderBy('idstates', $order)->get();
    //     return response()->json($states);
    // }

    // public function getState($id)
    // {
    //     $state = State::where('idstates', $id)->first();
    //     return response()->json($state);
    // }

    // public function insertState(Request $request)
    // {
    //     $state = new State;
    //     $state->name = $request->name;
    //     $state->country = $request->country;
    //     $state->save();
    //     return response()->json($state);
    // }

    // public function updateState(Request $request, $idstates)
    // {
    //     $state = State::find($idstates);
    //     $state->name = $request->name;
    //     $state->country = $request->country; 
    //     $state->save();
    //     return response()->json($state);
    // }

    // public function deleteState($idstates)
    // {
    //     $state = State::find($idstates);
    //     $state->delete();
    //     return response()->json(['message' => 'Ciudad eliminada correctamente']);
    // }

