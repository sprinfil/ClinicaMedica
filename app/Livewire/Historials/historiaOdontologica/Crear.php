<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

use App\Models\Paciente;
use Livewire\Component;

class Crear extends Component
{
    public $paciente;
    public $atendio;
    public $fecha;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.crear');
    }
    public function mount($paciente_id){
        $this->paciente = Paciente::find($paciente_id);
        $this->atendio = session('usuario')->nombre;
    }

}
