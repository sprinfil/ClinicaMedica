<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

use App\Models\Paciente;
use App\Models\Tratamiento;
use Livewire\Component;

class SubirImagen extends Component
{
    public $paciente;
    public $tratamiento;
    public $ticket_descargado = false;
    public function render()
    {
        return view('livewire.historials.historiaOdontologica.subir-imagen');
    }
    public function mount($paciente_id, $tratamiento_id){
        $this->paciente = Paciente::find($paciente_id);
        $this->tratamiento = Tratamiento::find($tratamiento_id);

    }

    public function descargar_ticket(){
        $this->ticket_descargado = true;
        return redirect( route('generar_ticket_venta', ['paciente_id' => $this->paciente->id, 'tratamiento_id' => $this->tratamiento->id]));

    }
}
