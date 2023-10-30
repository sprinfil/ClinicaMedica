<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    //
    public function index(Request $request){
        $paciente_id = $request->paciente_id;

        return view('historials.historia-clinica.historia-clinica', ['paciente_id' => $paciente_id]);
    }
}
