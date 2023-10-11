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
            return view('historials.historia-odontologica',compact('paciente_id'));
        }
        else{
            return redirect()->route('login');
        }
    }

}
