<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formality;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\DB;


class FormalityController extends Controller
{
    public function store(Request $request)
    {
        $formality = new Formality();
        $formality->user_name = $request->user_name;
        $formality->user_email = $request->user_email;
        $formality->type_visa = $request->type_visa; // O el campo relevante
        $formality->user_date = $request->user_date;
        $formality->user_adult = $request->user_adult;
        // Asignar otros campos si es necesario
        $formality->save();

        return redirect()->route('mis-vistas');
    }

    public function showAppointments()
    {
        $appointments = Formality::where('form_type', 'visas')
            ->where('user_email', auth()->user()->email)
            ->get();
        return view('mis_citas', compact('appointments'));
    }

    public function cancel($id)
    {
        $appointment = Formality::findOrFail($id);

        if ($appointment->user_email == auth()->user()->email) {
            $appointment->delete();
            return redirect()->route('mis-vistas')->with('success', 'Cita cancelada correctamente.');
        }

        return redirect()->route('mis-vistas')->with('error', 'No tienes permiso para cancelar esta cita.');
    }

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
        DB::beginTransaction(); 

        try {
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
                'form_type' => 'pasaporte',
            ]);
            $details = [
                'user_name' => $request->input('user_name'),
                'user_email' => $request->input('user_email'),
                'type_visa' => $request->input('type_visa'),
                'user_date' => $request->input('user_date'),
                'user_adult' => $request->input('user_adult'),
                'form_type' => $request->input('form_type', 'pasaporte'),
            ];
            
            Mail::to('mm0673222@gmail.com')->send(new AppointmentMail($details));
            
            DB::commit(); 

            
            return response()->json(['success' => true, 'message' => 'Solicitud de cita enviada exitosamente.']);
        } catch (\Exception $e) {
            DB::rollBack(); 
    
            return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo.'], 500);
        }
    }
    public function viewCotizaciones()
    {
        $cotizaciones = Formality::where('form_type', 'cotizacion')->get();
        return view('adminFold.cotizaciones', compact('cotizaciones'));
    }

    public function insertCotizacion(Request $request)
    {
    DB::beginTransaction(); 

    try {
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

        $details = [
            'user_name' => $request->input('user_name'),
            'user_whatsapp' => $request->input('user_whatsapp'),
            'user_destino' => $request->input('user_destino'),
            'user_date' => $request->input('user_date'),
            'user_pasajeros' => $request->input('user_pasajeros'),
            'form_type' => $request->input('form_type', 'cotizacion'),
        ];
        
        Mail::to('mm0673222@gmail.com')->send(new AppointmentMail($details));
       

        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de Cotización enviada exitosamente.']);
    
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo.'], 500);
    }
}

    public function viewComentarios()
    {
        $comentarios = Formality::where('form_type', 'comentarios')->get();
        return view('adminFold.comentarios', compact('comentarios'));
    }

    public function insertComentarios(Request $request)
    {
        DB::beginTransaction(); 
        try {

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

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'message' => $request->input('message'),
            'form_type' => $request->input('form_type', 'comentarios'),
        ];
        
        Mail::to('mm0673222@gmail.com')->send(new AppointmentMail($details));

        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Comentario enviado exitosamente.']);
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar. Por favor, inténtelo de nuevo.'], 500);
    }
    }

    public function viewRentas()
    {
        $rentas = Formality::where('form_type', 'renta')->get();
        return view('adminFold.renta', compact('rentas'));
    }

    public function insertRentas(Request $request)
    {
        DB::beginTransaction(); 

        try {

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
            'form_type' => $request->input('form_type', 'renta'), 
        ]);

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'type_transport' => $request->input('type_transport'),
            'user_date' => $request->input('user_date'),
            'user_pasajeros' => $request->input('user_pasajeros'),
            'form_type' => $request->input('form_type', 'renta'),
        ];
        
        Mail::to('mm0673222@gmail.com')->send(new AppointmentMail($details));
        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de Cita para Renta enviada exitosamente.']);
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo.'], 500);
    }
    }

    public function viewViajes()
    {
        $viajes = Formality::where('form_type', 'viajes')->get();
        return view('adminFold.viajesForm', compact('viajes'));
    }

    public function insertViajes(Request $request)
    {
        DB::beginTransaction(); 

        try{ 

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
            'form_type' => $request->input('form_type', 'viajes'), 
        ]);

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'user_kid' => $request->input('user_kid'),
            'form_type' => $request->input('form_type', 'viajes'),
        ];
        
        Mail::to('mm0673222@gmail.com')->send(new AppointmentMail($details));
        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de viaje enviada exitosamente.']);
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo.'], 500);
    }
    }

    public function viewVisas()
    {
        $visas = Formality::where('form_type', 'visas')->get();
        return view('adminFold.visas', compact('visas'));
    }

    public function insertVisas(Request $request)
    {
    DB::beginTransaction(); 

    try {
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
            'form_type' => $request->input('form_type', 'visas'), 
        ]);

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'type_visa' => $request->input('type_visa'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'form_type' => $request->input('form_type', 'visas'),
        ];
        
        Mail::to('mm0673222@gmail.com')->send(new AppointmentMail($details));
        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de cita enviada exitosamente.']);
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo.'], 500);
    }
    }

}
