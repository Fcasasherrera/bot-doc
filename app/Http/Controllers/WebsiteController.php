<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\SinEnfsController;

use App\Models\SinEnf;
use App\Models\Sintoma;
use Illuminate\Http\Request;

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
        return view('client.pages.dashboard.consult', compact('sintomas'));
    }

    public function consultDisease(Request $request)
    {
        $result1 = [];
        $result2 = [];
        $result3 = [];
        $enfermedades1 = SinEnf::where('idSintoma', $request->sintoma1)->get();
        foreach ($enfermedades1 as $key => $enfermedad1) {
            $result1[$key] = $enfermedad1->enfermedad->nombre;
        }

        $enfermedades2 = SinEnf::where('idSintoma', $request->sintoma2)->get();
        foreach ($enfermedades2 as $key => $enfermedad2) {
            $result2[$key] = $enfermedad2->enfermedad->nombre;
        }

        $enfermedades3 = SinEnf::where('idSintoma', $request->sintoma3)->get();
        foreach ($enfermedades3 as $key => $enfermedad3) {
            $result3[$key] = $enfermedad3->enfermedad->nombre;
        }

        $result = array_merge($result1, $result2, $result3);

        $result = array_count_values($result);


        return $result;
    }
}
