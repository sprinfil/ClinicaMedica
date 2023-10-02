<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;
class Usuarios extends Component
{

    use WithPagination;

    public function render()
    {
        $usuarios = Usuario::orderBy('id')->paginate(3);
        return view('livewire.usuarios.usuarios',compact('usuarios'));
    }

}
