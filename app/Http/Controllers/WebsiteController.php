<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\HistorialClin;
use App\Models\Paciente;
use App\Models\Signo;
use App\Models\Sintoma;
use App\Http\Controllers\Admin\SinEnfsController;
use App\Models\Diagnostico;
use App\Models\Enfermedad;
use App\Models\SinEnf;
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
        $sintomas = Sintoma::all();
        $citas = Cita::all();
        return view('client.pages.dashboard.consult', compact('sintomas', 'citas'));
    }
    public function result()
    {
        $resultados = Diagnostico::all();
        return view('client.pages.dashboard.result', compact('resultados'));
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
        $histClin = HistorialClin::where('idUsuario', $user->id)->orderBy('created_at', 'desc')->first();
        $currentTime = Carbon::now();
        $result1 = [];
        $result2 = [];
        $result3 = [];
        $enfermedades1 = SinEnf::where('idSintoma', $request->sintoma1)->get();
        foreach ($enfermedades1 as $key => $enfermedad1) {
            $result1[$key] = $enfermedad1->enfermedad->nombre;
        };

        $enfermedades2 = SinEnf::where('idSintoma', $request->sintoma2)->get();
        foreach ($enfermedades2 as $key => $enfermedad2) {
            $result2[$key] = $enfermedad2->enfermedad->nombre;
        }

        $enfermedades3 = SinEnf::where('idSintoma', $request->sintoma3)->get();
        foreach ($enfermedades3 as $key => $enfermedad3) {
            $result3[$key] = $enfermedad3->enfermedad->nombre;
        }
        $result = array_merge($result1, $result2, $result3);
        //final
        $result = array_count_values($result);
        arsort($result);
        $most_frequent = key($result);
        $enfermedad = Enfermedad::where('nombre', $most_frequent)->orderBy('created_at', 'desc')->first();
        // $sintomas = "[" . $request->sintoma1 . "," . $request->sintoma2 . "," . $request->sintoma3 . "]";
        // $signos = "[" . $request->sintoma1 . "," . $request->signos2 . "," . $request->signos3 . "]";
        $cita = Cita::create([
            'idHistorial' => $histClin->id,
            'idSigno' => $request->sintoma1,
            'idSintoma' => $request->sintoma1,
            'fechaCita' => $currentTime,
            'detalles' => $request->detalles,
        ]);
        $diagnostico = Diagnostico::create([
            'idCita' => $cita->id,
            'idEnfermedad' => $enfermedad->id,
            'idPruebaLab' => 1,
            'idPruebaMor' => 1,
            'idTratamiento' => 1,
            'detalles' => "asldkjhflasdfa",
        ]);
        return response([
            'status' => true,
            'data' => $result
        ]);
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
