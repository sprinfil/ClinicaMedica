<?php

namespace App\Livewire\Pacientes;

use App\Models\Paciente;
use Livewire\Component;

class Eliminar extends Component
{
    protected $listeners = ['eliminar'];

    public $esconder = 'hidden';
    public $paciente_objeto;

    public function render()
    {
        return view('livewire.pacientes.eliminar');
    }

    public function eliminar($paciente_id){
        $this->esconder = '';
        $this->paciente_objeto = Paciente::where('id', $paciente_id)->first();

        if (!$this->paciente_objeto) {
            // Handle the case where the user is not found
            $this->cerraar();
        }
    }

    public function save(){
        if ($this->paciente_objeto) {
            $paciente = $this->paciente_objeto;
            $this->paciente_objeto = null;
            $paciente->delete();
            $this->salir();
        }
    }

    public function salir(){
        $this->esconder = 'hidden';
        return redirect()->route('pacientes');
    }
}
