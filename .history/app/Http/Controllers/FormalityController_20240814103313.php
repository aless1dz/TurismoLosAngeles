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
   
    public function index()
    {
        
        return view('adminFold.formalities');
    }

    public function store(Request $request)
{
    $formality = new Formality($request->all());
    $formality->state_form = 'pendiente'; 
    $formality->save();

    return redirect()->route('auth.citasClientes')->with('success', 'Cita creada con éxito.');
}

public function destroy($idformalities)
{
    $formality = Formality::find($idformalities);

    if ($formality) {
        $formality->state_form = 'cancelada';
        $formality->save();


        return redirect()->route('auth.citasClientes')->with('success', 'Cita cancelada con éxito.');
    }

    return redirect()->route('auth.citasClientes')->with('error', 'Cita no encontrada.');
}
public function updateStatusVisas(Request $request, $idformalities)
{
$visa = Formality::findOrFail($idformalities);
$visa->state_form = $request->input('state_form');
$visa->save();

return redirect()->back()->with('success', 'Estado actualizado correctamente.');
}

public function updateStatusRentas(Request $request, $idformalities)
{
$renta = Formality::findOrFail($idformalities);
$renta->state_form = $request->input('state_form');
$renta->save();

return redirect()->back()->with('success', 'Estado actualizado correctamente.');
}

public function updateStatusPasaporte(Request $request, $idformalities)
{
$pasaporte = Formality::findOrFail($idformalities);
$pasaporte->state_form = $request->input('state_form');
$pasaporte->save();

return redirect()->back()->with('success', 'Estado actualizado correctamente.');
}

public function updateStatusViajes(Request $request, $idformalities)
{
$viajes = Formality::findOrFail($idformalities);
$viajes->state_form = $request->input('state_form');
$viajes->save();

return redirect()->back()->with('success', 'Estado actualizado correctamente.');
}

    public function myAppointments()
    {
        $citas = Formality::where('user_email', auth()->user()->email)->get();
        return view('auth.citasClientes', compact('citas'));
    }
    

    public function citasClientes()
    {       
         $userEmail = auth()->user()->email;

        $citas = Formality::where('user_email', auth()->user()->email)->get();
        
        
        return view('auth.citasClientes', compact('citas'));
    }

    public function misVistas()
    {
        $userEmail = auth()->user()->email;

        $citas = Formality::where('user_email', $userEmail)->get();

        return view('auth.citasClientes', compact('citas'));
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
            
            Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));
            
            DB::commit(); 

            
            return response()->json(['success' => true, 'message' => 'Solicitud de cita enviada exitosamente. Pronto nos comunicaremos contigo!']);
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
        
        Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));
       

        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de Cotización enviada exitosamente.']);
    
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo. Pronto nos comunicaremos contigo!'], 500);
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
        
        Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));

        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Comentario enviado exitosamente. Pronto revisaremos tu comentario!']);
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
            'state_form' => $request->input('state_form', 'pendiente'), 

        ]);

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'type_transport' => $request->input('type_transport'),
            'user_date' => $request->input('user_date'),
            'user_pasajeros' => $request->input('user_pasajeros'),
            'form_type' => $request->input('form_type', 'renta'),
        ];
        
        Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));
        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de Cita para Renta enviada exitosamente. Pronto nos comunicaremos contigo!']);
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
            'user_kids' => 'required|integer',

        ]);

        Formality::create([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'user_kids' => $request->input('user_kids'),

            'form_type' => $request->input('form_type', 'viajes'), 
            'state_form' => $request->input('state_form', 'pendiente'), 

        ]);

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'form_type' => $request->input('form_type', 'viajes'),
        ];
        
        Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));
        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de viaje enviada exitosamente. Pronto nos comunicaremos contigo!']);
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
            'user_name' => 'required|alpha_num',
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
            'state_form' => $request->input('state_form', 'pendiente'), 

        ]);

        $details = [
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'type_visa' => $request->input('type_visa'),
            'user_date' => $request->input('user_date'),
            'user_adult' => $request->input('user_adult'),
            'form_type' => $request->input('form_type', 'visas'),
        ];
        
        Mail::to('sifuentesdelacruzalex@gmail.com')->send(new AppointmentMail($details));
        DB::commit(); 

        return response()->json(['success' => true, 'message' => 'Solicitud de cita enviada exitosamente. Pronto nos comunicaremos contigo!']);
    } catch (\Exception $e) {
        DB::rollBack(); 

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar la solicitud. Por favor, inténtelo de nuevo.'], 500);
    }

    
}
public function updateStatus(Request $request, $id)
{
$cotizacion = Cotizacion::findOrFail($id);
$cotizacion->state_form = $request->input('state_form');
$cotizacion->save();

return redirect()->back()->with('success', 'Estado actualizado correctamente.');
}
}