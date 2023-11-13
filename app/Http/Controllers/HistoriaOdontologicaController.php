<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Faker\Core\File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        //Mount
        $paciente_id = $request->paciente_id;
        $paciente = Paciente::find($request->paciente_id);
        $atendio = session('usuario')->nombre;
        $fechaActual = Carbon::now();
        //$fechaActual = Carbon::now()->subHour();

        if(session()->has('usuario')){
            return view('historials.historia-odontologica.crear',
            compact('paciente_id','paciente','atendio','fechaActual'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function edit(Request $request){
            //Mount
            $paciente_id = $request->paciente_id;
            $tratamiento_id = $request->tratamiento_id;

            if(session()->has('usuario')){
                return view('historials.historia-odontologica.editar',
                compact('paciente_id','tratamiento_id'));
            }
            else{
                return redirect()->route('login');
            }
    }

    public function store(Request $request){
        //validar datos 
        $request->validate([
            'tratamiento' => 'required',
            'monto' => 'required|numeric',
        ]);

        
        $tratamiento = new Tratamiento;

        $tratamiento->tratamiento = $request->tratamiento;
        $tratamiento->fecha = $request->fecha;
        $tratamiento->nota = $request->nota;
        $tratamiento->metodo_pago = $request->metodo_pago;
        $tratamiento->monto = $request->monto;
        $tratamiento->usuario_id = session('usuario')->id;
        $tratamiento->paciente_id = $request->paciente_id;
        $tratamiento->save();
        $paciente_id = $request->paciente_id;
     
        return redirect(route('historia_odontologica_imagen',['paciente_id' => $paciente_id,'tratamiento_id' => $tratamiento->id]));
    }

    public function delete(Request $request){

        
        $imagenes = Imagen::where('tratamiento_id',$request->tratamiento_id);
        $imagenes->delete();
        
        $tratamiento = Tratamiento::find($request->tratamiento_id);
        $tratamiento->delete();

        return redirect(route('historia_odontologica', ['paciente_id' => $request->paciente_id]));
    }

}
