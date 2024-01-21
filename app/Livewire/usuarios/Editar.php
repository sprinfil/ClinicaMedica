<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\Attributes\On; 


class Editar extends Component
{
    protected $listeners = ['editar'];
    public $esconder = 'hidden';
    public $usuario_objeto;

    public $usuario = '';
    public $clave = '';
    public $nombre = '';
    public $apellido_1 = '';
    public $apellido_2 = '';
    public $Puesto = '';
    public $Tipo = '';

    
    public function render()
    {
        return view('livewire.usuarios.editar');
    }

    public function editar($usuario_id){
        $this->esconder = '';
        $this->usuario_objeto = Usuario::where('id', $usuario_id)->first();
        
        $this->usuario =  $this->usuario_objeto->usuario;
        $this->nombre =  $this->usuario_objeto->nombre;
        $this->apellido_1 =  $this->usuario_objeto->apellido_1;
        $this->apellido_2 =  $this->usuario_objeto->apellido_2;
        $this->Puesto =  $this->usuario_objeto->Puesto;
        $this->Tipo =  $this->usuario_objeto->Tipo;
    }


    public function cerrar(){
        $this->esconder = 'hidden';
        $this->dispatch('mount');
    }

    public function save(){
        //No modificar clave
        if($this->clave == ''){
            $validated = $this->validate([ 
                'usuario' => 'required|min:5',
                'nombre' => 'required',
                'apellido_1' => 'required',
                'apellido_2' => 'required',
                'Puesto' => 'required',
                'Tipo' => 'required'
        ]);
    
    
            $this->usuario_objeto->usuario =  $this->usuario;
            $this->usuario_objeto->nombre =  $this->nombre;
            $this->usuario_objeto->apellido_1 =  $this->apellido_1;
            $this->usuario_objeto->apellido_2 =  $this->apellido_2;
            $this->usuario_objeto->Puesto =  $this->Puesto;
            $this->usuario_objeto->Tipo =  $this->Tipo;
    
            $this->usuario_objeto->save();
    
            $this->cerrar();
        }
        else{
            //Modificar clave
            $validated = $this->validate([ 
                'usuario' => 'required|min:5',
                'clave' => 'required',
                'nombre' => 'required',
                'apellido_1' => 'required',
                'apellido_2' => 'required',
                'Puesto' => 'required',
                'Tipo' => 'required'
        ]);
    
    
            $this->usuario_objeto->usuario =  $this->usuario;
            $this->usuario_objeto->clave = bcrypt($this->clave);
            $this->usuario_objeto->nombre =  $this->nombre;
            $this->usuario_objeto->apellido_1 =  $this->apellido_1;
            $this->usuario_objeto->apellido_2 =  $this->apellido_2;
            $this->usuario_objeto->Puesto =  $this->Puesto;
            $this->usuario_objeto->Tipo =  $this->Tipo;
    
            $this->usuario_objeto->save();
    
            $this->cerrar();
        }

    }
}
