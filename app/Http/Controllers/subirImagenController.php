<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class subirImagenController extends Controller
{
    public function index(Request $request){
        $paciente = Paciente::find($request->paciente_id);
        $tratamiento = Tratamiento::find($request->tratamiento_id);
        return view('historials.historia-odontologica.subir-imagen',compact('paciente','tratamiento'));
    }

    public function store(Request $request){
        $tratamiento = Tratamiento::find($request->tratamiento_id);

        //guardar la imagen y obtener ruta
        $clinica = $request->file('file')->store('public/clinica/'.$tratamiento->id);

        //convertir la ruta en vez de public a storage
        $url_clinica = Storage::url($clinica);

        //crear las imagenes
        $imagen = new Imagen;
        $imagen->clinica = $url_clinica;
        $imagen->tratamiento_id = $tratamiento->id;
        $imagen->save();
    }

    public function salir(Request $request){
        $paciente_id = $request->paciente_id;
        return redirect(route('historia_odontologica',['paciente_id' => $paciente_id]));
    }
}
