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
use App\Models\SigEnf;
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
    public function consult(Request $request, $sintomas, $signos)
    {
        $flag = false;
        $query = Cita::select();
        if (strpos($sintomas, 'todos') === false) {
            $query->where('idSintoma', $sintomas);
            $flag = true;
        }
        if (strpos($signos, 'todos') === false) {
            $query->where('idSintoma', $signos);
            $flag = true;
        }
        $citas = $query->paginate(10);
        // $citas = Cita::paginate(10);
        $sintomas = Sintoma::all();
        return view('client.pages.dashboard.consult', compact('sintomas', 'citas', 'flag'));
    }
    public function result()
    {
        return view('client.pages.dashboard.result', [
            'resultados' => Diagnostico::paginate(10)
        ]);
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

        $signosEnf = [];
        $signoPrincipal = 1;
        if (isset($request->signos)) {
            $signos = explode(":", $request->signos);
            $signoPrincipal = $signos[0];
            foreach ($signos as $key => $signoEnf) {
                $signosEnf[$key] = SigEnf::where('idSigno', $signoEnf)->first();
                $signosEnf[$key] = $signosEnf[$key]->enfermedad->nombre;
            }
        }

        $pruebas_labs = [];
        $pruebas_mortem = [];
        $tratamientos = [];

        $sintomas = explode(":", $request->sintomas);
        $sintomaPrincipal = $sintomas[0];
        foreach ($sintomas as $key => $sintomaEnf) {
            $sintomasEnf[$key] = SinEnf::where('idSintoma', $sintomaEnf)->first();
            $pruebas_labs[$key] = $sintomasEnf[$key]->enfermedad->pruebalab;
            $pruebas_mortem[$key] = $sintomasEnf[$key]->enfermedad->pruebapostmortem;
            $tratamientos[$key] = $sintomasEnf[$key]->enfermedad->tratamiento;
            $result[$key] = $sintomasEnf[$key]->enfermedad->nombre;
        }

        $result = array_merge($result, $signosEnf);

        $porcentajes = [];
        $total = count($result);
        $pruebasLabs = [];

        if (isset($request->pruebas_lab)) {
            $pruebasL = explode(":", $request->pruebas_lab);
            foreach ($pruebasL as $key => $pruebaL) {
                $pruebasLabs[$key] = Enfermedad::where('id', $pruebaL)->first();
                $pruebasLabs[$key] = $pruebasLabs[$key]->nombre;
            }
            $pruebasLabs = implode($pruebasLabs);
            $resulta2 =  $result;
            $result = array_unique($result);
            sort($result);

            $eliminar = array_search($pruebasLabs, array_values($result));

            unset($result[$eliminar]);
            $conteo = array_count_values($resulta2);
            $eliminar2 = array_search($pruebasLabs, array_values($resulta2));


            if (isset($conteo[$pruebasLabs])) {
                for ($i = 0; $i < $conteo[$pruebasLabs]; $i++) {
                    // dd($conteo[$pruebasLabs]);
                    unset($resulta2[$eliminar2 + $i]);
                }
            }



            $conteo2 = array_count_values($resulta2);

            $total = count($resulta2);
            foreach ($conteo2 as $key => $cont) {
                $porcentajes[$key] = ((float)$cont * 100) / $total;
                $porcentajes[$key] = round($porcentajes[$key], 0);
            }

            $info = [];
            $info['enfermedad'] = $porcentajes;
            $info['tratamientos'] = array_unique($tratamientos);

            $info['pruebas_labs'] = array_unique($pruebas_labs);
            $info['pruebas_mortem'] = array_unique($pruebas_mortem);

            sort($info['tratamientos']);
            sort($info['pruebas_labs']);
            sort($info['pruebas_mortem']);

            unset($info['tratamientos'][$eliminar]);
            unset($info['pruebas_labs'][$eliminar]);
            unset($info['pruebas_mortem'][$eliminar]);
        } else {
            $conteo = array_count_values($result);
            foreach ($conteo as $key => $cont) {
                $porcentajes[$key] = ((float)$cont * 100) / $total;
                $porcentajes[$key] = round($porcentajes[$key], 0);
            }

            $info = [];
            $info['enfermedad'] = $porcentajes;
            $info['tratamientos'] = array_unique($tratamientos);
            $info['pruebas_labs'] = array_unique($pruebas_labs);
            $info['pruebas_mortem'] = array_unique($pruebas_mortem);
        }

        // dd($info);

        //pruebas post mortem y laboratorio

        //agregar parametros de pruebas postmortem, de laboratorio, 


        arsort($info["enfermedad"]);
        $most_frequent = key($info["enfermedad"]);
        $enfermedad = Enfermedad::where('nombre', $most_frequent)->orderBy('created_at', 'desc')->first();

        // return $sintomaPrincipal;
        $cita = Cita::create([
            'idHistorial' => $histClin->id,
            'idSigno' => $signoPrincipal,
            'idSintoma' => $sintomaPrincipal,
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
            $info
        ]);
    }
    public function sintomas()
    {
        return response([
            'status' => true,
            'data' => Sintoma::all()
        ]);
    }
    public function enfermedades()
    {
        return response([
            'status' => true,
            'data' => Enfermedad::all()
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
