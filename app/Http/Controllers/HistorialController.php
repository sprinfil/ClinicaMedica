<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paciente;
use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->has('usuario')){
            return view('historials.index');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function expediente(Request $request){
        $paciente = Paciente::find($request->paciente_id);
        $fecha_nacimiento = Carbon::parse($paciente->fecha_nac);
        $edad = $fecha_nacimiento->age;
        return view('historials.expediente',compact('paciente','edad'));
    }

    public function consentimiento($paciente_id){
        return view('historials.consentimiento', ['paciente_id' => intval($paciente_id)]);
    }
}
