<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;
class Usuarios extends Component
{

    use WithPagination;
    public $usuario;

    public function render()
    {
        $usuarios = Usuario::orderBy('id')->paginate(10);
        return view('livewire.usuarios.usuarios',compact('usuarios'));
    }

    public function editar($usuario_id){
        $this->dispatch('editar', ['usuario' => $usuario_id]);
    }

    public function eliminar($usuario_id){
        $this->dispatch('eliminar', ['usuario' => $usuario_id]);
    }
}
