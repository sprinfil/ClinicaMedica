<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (session()->has('usuario')) {
            // El usuario está autenticado, puedes continuar con la lógica de tu controlador
            return view('layouts.principal');
        } else {
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }
    
}
