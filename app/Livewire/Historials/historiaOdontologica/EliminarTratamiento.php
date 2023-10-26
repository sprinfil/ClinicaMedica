<?php

namespace App\Livewire\Historials\historiaOdontologica;

use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Livewire\Component;
use Livewire\Attributes\On; 

class EliminarTratamiento extends Component
{
    public $tratamiento;
    public $esconder = 'hidden';
    public $paciente;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.eliminar-tratamiento');
    }

    #[On('advertenciaTratamientoEliminar')] 
    public function mostrar($data){
        $this->tratamiento = Tratamiento::find($data['tratamiento_id']);
        $this->paciente = Paciente::find($data['paciente_id']);
        $this->esconder = '';
    }

    public function salir(){
        $this->esconder="hidden";
    }
}
