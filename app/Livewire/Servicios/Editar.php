<?php

namespace App\Livewire\Servicios;

use App\Models\Servicio;
use DateTime;
use Livewire\Component;
use Livewire\Attributes\On; 

class Editar extends Component
{
    protected $listeners = ['editar'];
    public $esconder = 'hidden';
    public $servicio_objeto;

    public $nombre = '';
    public $precio = 0;

    public function render()
    {
        return view('livewire.servicios.editar');
    }

    public function editar($servicio_id){
        $this->esconder = '';
        $this->servicio_objeto = Servicio::where('id', $servicio_id)->first();  

        $this->nombre =  $this->servicio_objeto->nombre;
        $this->precio =  $this->servicio_objeto->precio;
    }


    public function cerrar(){
        $this->esconder = 'hidden';
        $this->dispatch('mount');
    }

    public function save(){
        $this->validate([ 
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        $this->servicio_objeto->nombre =  $this->nombre;
        $this->servicio_objeto->precio =  $this->precio;
    
        $this->servicio_objeto->save();
    
        Editar::cerrar();
    }

}
