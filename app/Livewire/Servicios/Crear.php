<?php

namespace App\Livewire\Servicios;

use App\Models\Servicio;
use Livewire\Component;

class Crear extends Component
{
    public $esconder = 'hidden';

    //variables de creacion de servicios
    public $nombre = '';
    public $precio;

    public function render()
    {
        return view('livewire.servicios.crear');
    }

    public function save()
    {
        $this->validate([ 
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        $data = [
            'nombre'=> $this->nombre,
            'precio' => $this->precio ?? 0,
        ];
        servicio::create($data);

        $this->nombre = '';
        $this->precio = 0;

        $this->cancel();
        $this->dispatch('mount');
    }

    public function cancel(){
        $this->esconder = 'hidden';
        $this->dispatch('mount');
    }
}
