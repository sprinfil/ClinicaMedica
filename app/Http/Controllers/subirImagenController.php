<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class subirImagenController extends Controller
{
    public function index(Request $request){
        $paciente = Paciente::find($request->paciente_id);
        $tratamiento = Tratamiento::find($request->tratamiento_id);
        return view('historials.historia-odontologica.subir-imagen',compact('paciente','tratamiento'));
    }

    public function store_clinica(Request $request){
       $tratamiento = Tratamiento::find($request->tratamiento_id);

        //guardar la imagen y obtener ruta
        //eliminar
        $rutaBase = storage_path('app/public/clinica/'.$tratamiento->id);
        File::makeDirectory($rutaBase, 0775, true, true);
        //eliminar

        $imagen = $request->file('file')->store('public/clinica/'.$tratamiento->id.'/');

        //convertir la ruta en vez de public a storage
        $url_imagen = Storage::url($imagen);

        //crear las imagenes
        $imagen = new Imagen;
        $imagen->url = $url_imagen;
        $imagen->tipo = 'clinica';
        $imagen->tratamiento_id = $tratamiento->id;
        $imagen->save();
    }

    public function store_radiografia(Request $request){
        $tratamiento = Tratamiento::find($request->tratamiento_id);

        //eliminar
        $rutaBase = storage_path('app/public/radiografia/'.$tratamiento->id);
        File::makeDirectory($rutaBase, 0775, true, true);
        //eliminar

        //guardar la imagen
        $imagen = $request->file('file')->store('public/radiografia/'.$tratamiento->id.'/');

        //convertir la ruta en vez de public a storage
        $url_imagen = Storage::url($imagen);

        //crear las imagenes
        $imagen = new Imagen;
        $imagen->url = $url_imagen;
        $imagen->tipo = 'radiografia';
        $imagen->tratamiento_id = $tratamiento->id;
        $imagen->save();
    }

    public function salir(Request $request){
        $paciente_id = $request->paciente_id;
        return redirect(route('historia_odontologica',['paciente_id' => $paciente_id]));
    }


    public function subir_logo(Request $request){
          $nombreArchivo = 'logo.png';
          $request->file('file')->storeAs('public/images/', $nombreArchivo);
    }
}
