<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* 
                try{
            $this->validate($request, [
                'usuario' => 'required|min:5',
                'clave' => 'required',
                'nombre' => 'required',
                'apellido_1' => 'required',
                'apellido_2' => 'required',
                'Puesto' => 'required',
                'Tipo' => 'required'
            ]);
    
            $clave_encriptada = bcrypt($request->clave);
    
            $usuario = new Usuario();
            $usuario->usuario = $request->usuario;
            $usuario->clave = $clave_encriptada;
            $usuario->nombre = $request->nombre;
            $usuario->apellido_1 = $request->apellido_1;
            $usuario->apellido_2 = $request->apellido_2;
            $usuario->puesto = $request->Puesto;
            $usuario->tipo = $request->Tipo;
            
            $usuario->save();
    
            return redirect('usuarios');
        }catch(Exception $e){

        }
        
        */


    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    //Metodo para mostrar el crud de los usuarios
    public function show_crud(){
        if (session()->has('usuario')){
            if(session('usuario')->Tipo === 'Admin'){
                return view('usuarios.crud');
            }
            else
                {
                    return redirect()->route('home');
                }
        }
        else
            return redirect()->route('login');
    }
}
