<?php

namespace App\Livewire\Servicios;

use App\Models\Servicio;
use Livewire\Component;

class Eliminar extends Component
{
    protected $listeners = ['eliminar'];

    public $esconder = 'hidden';
    public $servicio_objeto;

    public function render()
    {
        return view('livewire.servicios.eliminar');
    }

    public function eliminar($servicio_id){
        $this->esconder = '';
        $this->servicio_objeto = Servicio::where('id', $servicio_id)->first();

        if (!$this->servicio_objeto) {
            // Handle the case where the user is not found
            $this->salir();
        }
    }

    public function save(){
        if ($this->servicio_objeto) {
            $servicio = $this->servicio_objeto;
            $this->servicio_objeto = null;
            $servicio->delete();
            $this->salir();
        }
    }

    public function salir(){
        $this->esconder = 'hidden';
        return redirect()->route('servicios.index');
    }
}
