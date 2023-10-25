<?php

namespace App\Livewire\Historials\historiaOdontologica;

use App\Models\Imagen;
use Livewire\Component;
use Livewire\Attributes\On; 


class EliminarImagen extends Component
{
   

    public $esconder = "hidden";
    public $imagen;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.eliminar-imagen');
    }

    #[On('advertencia')] 
    public function mostrar($imagen_id){
        $this->esconder = "";
        $this->imagen = Imagen::find($imagen_id)->first();
    }

    public function salir(){
        $this->esconder = "hidden";
    }

    public function save(){
        $this->salir();
        $this->dispatch('EliminarImagen', id: $this->imagen->id);
    }
}
