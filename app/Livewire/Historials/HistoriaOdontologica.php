<?php

namespace App\Livewire\Historials;

use App\Models\Paciente;
use Carbon\Carbon;
use Livewire\Component;

class HistoriaOdontologica extends Component
{
    public $paciente;
    public $fecha_nacimiento;
    public $edad;

    public function render()
    {
        return view('livewire.historials.historia-odontologica');
    }
    public function mount($paciente_id){
        $this->paciente = Paciente::find($paciente_id);
        $this->fecha_nacimiento = Carbon::parse($this->paciente->fecha_nac);
        $this->edad = $this->fecha_nacimiento->age;
    }
}
