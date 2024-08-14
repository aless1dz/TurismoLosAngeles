<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;

class AssociatesController extends Controller{
    public function view(){
        return view('adminFold.associates');
    }

    public function index()
    {
        return response()->json(Associate::all(), 200);
    }

    public function show($idassociates)
    {
        return response()->json(Associate::find($idassociates), 200);
    }

    public function store(Request $request)
    {
        $associate = Associate::create($request->all());
        return response()->json($associate, 201);
    }

    public function update(Request $request, $idassociates)
    {
        $associate = Associate::findOrFail($idassociates);
        $associate->update($request->all());
        return response()->json($associate, 200);
    }

    public function destroy($idassociates)
    {
        Associate::findOrFail($idassociates)->delete();
        return response()->json(null, 204);
    }
}
