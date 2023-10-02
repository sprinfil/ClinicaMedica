<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function store(){
        Auth::logout(); // Cierra la sesión del usuario
        session()->flush(); // Borra todos los valores de la sesión
        return redirect()->route('login'); // Redirige a la página de inicio de sesión
    }
}
