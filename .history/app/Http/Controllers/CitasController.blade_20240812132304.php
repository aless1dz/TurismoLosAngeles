<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formality;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Formality::all();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_date' => 'required|date',
            'message' => 'required|string',
        ]);
       

        Formality::create($request->all());

        return redirect()->route('auth.citasClientes')->with('success', 'Cita agregada correctamente.');
    }

   
}
