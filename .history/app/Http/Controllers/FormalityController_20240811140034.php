<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formality;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;
use Exception;

class FormalityController extends Controller
{

    public function index()
    {
        
        return view('adminFold.formalities');
    }

    public function viewPasaportes()
    {
        $pasaportes = Formality::where('type_visa', '!=', null)->get();
        return view('adminFold.pasaportes', compact('pasaportes'));
    }

    public function insertPasaporte(Request $request)
    {
        try {
            $request->validate([
                'user_name' => 'required|string|max:60',
                'user_email' => 'required|email|max:60',
                'type_visa' => 'required|in:primera_vez,renovacion',
                'user_date' => 'required|date',
                'user_adult' => 'required|integer',
            ]);

            $formality = Formality::create([
                'user_name' => $request->input('user_name'),
                'user_email' => $request->input('user_email'),
                'type_visa' => $request->input('type_visa'),
                'user_date' => $request->input('user_date'),
                'user_adult' => $request->input('user_adult'),
                'form_type' => 'pasaporte',
            ]);

            $details = [
                'name' => $request->input('user_name'),
                'email' => $request->input('user_email'),
                'type_visa' => $request->input('type_visa'),
                'date' => $request->input('user_date'),
                'adults' => $request->input('user_adult')
            ];

            
        
            Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));

            return response()->json(['success' => true, 'message' => 'Solicitud de cita enviada exitosamente.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function viewCotizaciones()
    {
        $cotizaciones = Formality::where('form_type', 'cotizacion')->get();
        return view('adminFold.cotizaciones', compact('cotizaciones'));
    }

    public function insertCotizacion(Request $request)
    { 
        $request->validate([
            'user_name' => 'required|string|max:60',
            'user_whatsapp' => 'required|string|max:45',
            'user_destino' => 'required|string|max:45',
            'user_date' => 'required|date',
            'user_pasajeros' => 'required|integer|min:0',
        ]);

        Formality::create([
            'user_name' => $request->input('user_name'),
            'user_whatsapp' => $request->input('user_whatsapp'),
            'user_destino' => $request->input('user_destino'),
            'user_date' => $request->input('user_date'),
            'user_pasajeros' => $request->input('user_pasajeros'),
            'form_type' => $request->input('form_type', 'cotizacion'), 
        ]);

        return response()->json(['success' => true, 'message' => 'Solicitud de Cotización enviada exitosamente.']);
    }

    public function viewComentarios()
    {
        $comentarios = Formality::where('form_type', 'comentarios')->get();
        return view('adminFold.comentarios', compact('comentarios'));
    }

    public function insertComentarios(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:60',
            'user_email' => 'required|string|max:45',
            'message' => 'required|string|max:150',
        ]);

        Formality::create([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'message' => $request->input('message'),
            'form_type' => $request->input('form_type', 'comentarios'), 
        ]);

        return response()->json(['success' => true, 'message' => 'Comentario enviado exitosamente.']);
    }

    public function viewRentas()
    {
        $rentas = Formality::where('form_type', 'renta')->get();
        return view('adminFold.renta', compact('rentas'));
    }

    public function insertRentas(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:60',
            'user_email' => 'required|string|max:45',
            'type_transport' => 'required|in:autobus,sprinter,hiace',
            'user_date' => 'required|date',
            'user_pasajeros' => 'required|integer|min:0',
        ]);

        Formality::create([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'type_transport' => $request->input('type_transport'),
            'user_date' => $request->input('user_date'),
            'user_pasajeros' => $request->input('user_pasajeros'),
            'form_type' => 'renta',
        ]);

        return response()->json(['success' => true, 'message' => 'Solicitud de Cita para Renta enviada exitosamente.']);
    }

    public function viewViajes()
    {
        $viajes = Formality::where('form_type', 'viajes')->get();
        return view('adminFold.viajesForm', compact('viajes'));
    }

    public function insertViajes(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:60',
            'user_email' => 'required|string|max:45',
            'user_date' => 'required|date',
            'user_adult' => 'required|integer',
            'user_kid' => 'required|integer',
        ]);

        Formality::create([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'user_kid' => $request->input('user_kid'),
            'form_type' => 'viajes',
        ]);

        return response()->json(['success' => true, 'message' => 'Solicitud de viaje enviada exitosamente.']);
    }

    public function viewVisas()
    {
        $visas = Formality::where('form_type', 'visas')->get();
        return view('adminFold.visas', compact('visas'));
    }

    public function insertVisas(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:60',
            'user_email' => 'required|email|max:60',
            'type_visa' => 'required|in:primera_vez,renovacion',
            'user_date' => 'required|date',
            'user_adult' => 'required|integer',
        ]);

        Formality::create([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'type_visa' => $request->input('type_visa'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'form_type' => 'visas', 
        ]);

        return response()->json(['success' => true, 'message' => 'Solicitud de cita enviada exitosamente.']);
    }
}