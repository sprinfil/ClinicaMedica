<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
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
        $fechaActual = now();

        if(session()->has('usuario')){
            return view('historials.historia-odontologica.crear',
            compact('paciente_id','paciente','atendio','fechaActual'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request){
        //validar datos 
     
        try{
            $request->validate([
                'tratamiento' => 'required',
                'monto' => 'required',
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
            /*
                
            //guardar la imagen y obtener ruta
            $clinica = $request->file('clinica')->store('public/clinica/'.$tratamiento->id);
    
            //convertir la ruta en vez de public a sotrage
            $url_clinica = Storage::url($clinica);
    
    
            //crear las imagenes
            $imagen = new Imagen;
            $imagen->clinica = $url_clinica;
            $imagen->tratamiento_id = $tratamiento->id;
            $imagen->save();

            */
            $paciente_id = $request->paciente_id;
            return redirect(route('historia_odontologica',['paciente_id' => $paciente_id]));
           
        }catch(ValidationException $e){
            dd('hola');
            return 'error';
        }
 
    }

}
