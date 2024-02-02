<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario;
use Livewire\Component;

class Crear extends Component
{

    public $esconder = 'hidden';

    //variables de creacion de usuarios
    public $usuario = '';
    public $clave = '';
    public $nombre = '';
    public $apellido_1 = '';
    public $apellido_2 = '';
    public $Puesto = '';
    public $Tipo = '';
    public $clave2 = '';
    public $correo ='';
    public $celular = '';

    public function render()
    {
        return view('livewire.usuarios.crear');
    }

    public function save()
    {
        $this->validate([ 
                'usuario' => 'required|min:5',
                'clave' => 'required',
                'clave2' => 'required|same:clave',
                'nombre' => 'required',
                'apellido_1' => 'required',
                'apellido_2' => 'required',
                'Puesto' => 'required',
                'Tipo' => 'required',
                'celular' => 'nullable',
                'correo' => 'nullable'
        ]);

        $usuario = new Usuario();

        $usuario->usuario = $this->usuario;
        $usuario->nombre = $this->nombre;
        $usuario->apellido_1 = $this->apellido_1;
        $usuario->apellido_2 = $this->apellido_2;
        $usuario->celular = $this->celular;
        $usuario->correo = $this->correo;
        $usuario->clave = bcrypt($this->clave);
        $usuario->puesto = $this->Puesto;
        $usuario->tipo = $this->Tipo;
        $usuario->status = 'ACTIVO';
        $usuario->save();

       $this->cancel();
    }

    public function cancel(){
        $this->esconder = 'hidden';
        $this->dispatch('mount');
    }
}
