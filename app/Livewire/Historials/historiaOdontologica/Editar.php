<?php

namespace App\Livewire\Historials\historiaOdontologica;

use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Carbon\Carbon;
use Livewire\Component;

class Editar extends Component
{
    public $paciente;
    public $tratamiento;
    public $fechaTratamiento;
    public $tratamientoNombre;
    public $nota;
    public $monto;
    public $imagenes;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.editar');
    }

    public function Mount($tratamiento_id, $paciente_id){
        
        $this->tratamiento = Tratamiento::find($tratamiento_id);
        $this->paciente = Paciente::find($paciente_id);

        $this->fechaTratamiento = new Carbon($this->tratamiento->fecha);

 
        $this->tratamientoNombre = $this->tratamiento->tratamiento;
        $this->nota = $this->tratamiento->nota;
        $this->monto = $this->tratamiento->monto;

        $this->imagenes = Imagen::where('tratamiento_id',$this->tratamiento->id)->get();

    }
}
