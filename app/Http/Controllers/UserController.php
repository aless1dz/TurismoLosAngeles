<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\RegistroConfirmacion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;

class UserController extends Controller
{
    public function vistaLogin(){
        return view('Auth.iniciarSesionTurismoLosAngeles');
    }

    public function vistaRegistro(){
        return view('Auth.registrarseTurismoLosAngeles');
    }

    public function inicioTurismoLosAngeles(){
        return view('Auth.inicio-turismo-los-angeles');
    }

    public function citasTurismoLosAngeles(){
        return view('Auth.citasTurismoLosAngeles');
    }

    public function logear(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ],[
            'email.required'=>'El email es necesario',
            'password.required'=>'La contraseña es necesaria',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->email_verified_at === null) {
                Auth::logout();
                return redirect()->back()->with('error', 'Por favor, verifica tu correo electrónico antes de iniciar sesión.');
            }
            return redirect()->intended('/inicio');
        }
        return redirect()->back()->withErrors(['invalid_credentials' => 'Estas credenciales no coinciden con nuestros registros.']);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/inicio');
    }

    public function registrar(Request $request)
    {
        $request->validate([
             'name' => 'required|string|max:255',
             'last_name'=>'required|string|max:255',
             'birthdate'=>'required|date',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',

        ],[
            'name.required'=>'El nombre es necesario',
            'last_name.required'=>'El apellido es necesario',
            'birthdate.required'=>'La fecha de nacimiento es necesaria',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'email.required'=>'El email es necesario',
            'email.unique'=>'El email ya es utilizado',
            'password.required'=>'La contraseña es necesaria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',

        ]
        );

        $user = User::create([
            'name' => $request->name,
            'last_name'=> $request->last_name,
            'birthdate'=> $request->birthdate,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $this->enviarCorreo($user->email);

        return redirect('/iniciar-sesion')->with('message', 'Registro exitoso. Te hemos enviado un correo de bienvenida.');

    }

    public function view(){
        return view('adminFold.clientes');
    }

    public function getUsers(Request $request)
    {
        $order = $request->query('order', 'asc');
        $users = User::orderBy('id', $order)->get();
        return response()->json($users);
    }


    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->save();
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'Cliente eliminado correctamente']);
    }

    public function role()
{
    return $this->belongsTo(Role::class);
}
}
