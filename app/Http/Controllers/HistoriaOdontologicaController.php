<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriaOdontologicaController extends Controller
{
    public function index(Request $request)
    {
        //
        $paciente_id = $request->paciente_id;
        
        if(session()->has('usuario')){
            return view('historials.historia-odontologica.historia-odontologica',compact('paciente_id'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function create(Request $request)
    {
        //
        $paciente_id = $request->paciente_id;
        
        if(session()->has('usuario')){
            return view('historials.historia-odontologica.crear',compact('paciente_id'));
        }
        else{
            return redirect()->route('login');
        }
    }

}
