<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;

class Crear extends Component
{

    public $esconder = '';

    public function render()
    {
        return view('livewire.usuarios.crear');
    }
}
