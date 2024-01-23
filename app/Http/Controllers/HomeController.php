<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (session()->has('usuario')) {
            // El usuario está autenticado, puedes continuar con la lógica de tu controlador
            $citas_ordenadas = Cita::orderby('fecha','asc')
        ->orderby('hora_inicio','asc')
        ->where('confirmada',1)
        ->where('fecha','>',Carbon::now()->toDateString())
        ->orWhere(function ($query){
            $query->where('fecha', '>=', Carbon::now()->toDateString())
            ->where('hora_fin', '>', Carbon::now()->format('H:i:s'))->where('confirmada',1);
        })->get();
        

            return view('home',compact('citas_ordenadas'));
        } else {
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }
    
}
