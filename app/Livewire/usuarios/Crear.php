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

    public function render()
    {
        return view('livewire.usuarios.crear');
    }

    public function save()
    {

        //primera vuelta para validar los datos (si no lo hago de esta manera la contrasena se encripta en tiempo de ejecucion)
        $validated = $this->validate([ 
                'usuario' => 'required|min:5',
                'clave' => 'required',
                'nombre' => 'required',
                'apellido_1' => 'required',
                'apellido_2' => 'required',
                'Puesto' => 'required',
                'Tipo' => 'required'
        ]);

        //encripto la contraseña 
        $this->clave = bcrypt($this->clave);

        //vuelvo a llenar todos los datos de validated (tengo que llenar todos por que si solo lleno clave no tendra los 
        //demas datos al momento de pasarlo a la funcion create)
        
        $validated = $this->validate([ 
            'usuario' => 'required|min:5',
            'clave' => 'required',
            'nombre' => 'required',
            'apellido_1' => 'required',
            'apellido_2' => 'required',
            'Puesto' => 'required',
            'Tipo' => 'required'
    ]);

        Usuario::create($validated);

        return redirect('usuarios');
    }

    public function cancel(){
        $this->esconder = 'hidden';
        return redirect('usuarios');
    }
}
