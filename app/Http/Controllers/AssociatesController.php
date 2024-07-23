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

    public function show($id)
    {
        return response()->json(Associate::find($id), 200);
    }

    public function store(Request $request)
    {
        $associate = Associate::create($request->all());
        return response()->json($associate, 201);
    }

    public function update(Request $request, $id)
    {
        $associate = Associate::findOrFail($id);
        $associate->update($request->all());
        return response()->json($associate, 200);
    }

    public function destroy($id)
    {
        Associate::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
