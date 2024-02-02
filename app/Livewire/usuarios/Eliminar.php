<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario;
use Livewire\Component;

class Eliminar extends Component
{
    //protected $listeners = ['eliminar'];

    public $esconder = 'hidden';
    public $usuario_objeto;

    public function render()
    {
        return view('livewire.usuarios.eliminar');
    }

    public function eliminar($usuario_id){
        $this->esconder = '';
        $this->usuario_objeto = Usuario::where('id', $usuario_id)->first();

        if (!$this->usuario_objeto) {
            // Handle the case where the user is not found
            $this->cerraar();
        }
    }

    public function save(){
        if ($this->usuario_objeto) {
            $usuario = $this->usuario_objeto;
            $this->usuario_objeto = null;
            $usuario->delete();
            $this->salir();
        }
    }

    public function salir(){
        $this->esconder = 'hidden';
        return redirect('usuarios');
    }
}
