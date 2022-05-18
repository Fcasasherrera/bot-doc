<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\HistorialClin;
use App\Models\Paciente;
use App\Models\Signo;
use App\Models\Sintoma;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('client.pages.home.index');
    }
    public function dashboard()
    {
        return view('client.pages.dashboard.index');
    }
    public function consult()
    {
        return view('client.pages.dashboard.consult');
    }
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->orderBy('created_at', 'desc')->first();
        if ($user != null) {
            return response('MF004');
        }
        $currentTime = Carbon::now();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $usuario = Usuario::create([
            'nombre' => $request->name,
            'matricula' => $this->generateRandomString(),
            'fechaIng' => $currentTime,
            'contraseña' => Hash::make($request->password),
            'puesto' => 'Paciente',
        ]);
        $paciente = Paciente::create([
            'nombre' => $request->name,
            'nss' => $request->nss,
            'fechaNac' =>  Carbon::parse($request->bornDate),
            'sexo' => $request->sex,
        ]);
        $paciente = Paciente::where('nombre', $request->name)->orderBy('created_at', 'desc')->first();
        $usuario = Usuario::where('nombre', $request->name)->orderBy('created_at', 'desc')->first();

        $hist = HistorialClin::create([
            'idUsuario' => $usuario->id,
            'idPaciente' => $paciente->id,
            'fechaCreacion' => $currentTime,
        ]);
        return response('MF200');
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->orderBy('created_at', 'desc')->first();
        if ($user == null) {
            return response('MF004');
        }
        if (!Hash::check($request->password, $user->password)) {
            return response('MF003');
        }
        return response('MF200');
    }
    public function createCite(Request $request)
    {
        $user = User::where('email', $request->email)->orderBy('created_at', 'desc')->first();
        if ($user == null) {
            return response('MF004');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response('MF200');
    }
    public function sintomas()
    {
        return response([
            'status' => true,
            'data' => Sintoma::all()
        ]);
    }
    public function signos()
    {
        return response([
            'status' => true,
            'data' => Signo::all()
        ]);
    }
    public function citas()
    {
        return response([
            'status' => true,
            'data' => Cita::all()
        ]);
    }
}
