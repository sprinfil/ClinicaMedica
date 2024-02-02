<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'usuario' => 'required|min:5',
            'clave' => 'required'
        ]);

        $usuario = $request->input('usuario');
        $clave = $request->input('clave');

        $usuarioEncontrado = Usuario::where('usuario', $usuario)->first();

        if($usuarioEncontrado->status == "ACTIVO"){
            if ($usuarioEncontrado && password_verify($clave, $usuarioEncontrado->clave)) {
                // Autenticación exitosa
                // Puedes guardar el usuario en la sesión si es necesario
                session(['usuario' => $usuarioEncontrado]);                   
                return redirect()->route('home');
    
            } else {
                // Autenticación fallida
                return back()->with('mensaje', 'Credenciales Incorrectas');
            }     
        }else{
            return back()->with('mensaje', 'cuenta suspendida');
        }

    }
}
