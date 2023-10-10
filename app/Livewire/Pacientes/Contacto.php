<?php

namespace App\Livewire\Pacientes;

use Livewire\Component;
use App\Models\Paciente;

class Contacto extends Component
{
    protected $listeners = ['contacto'];

    public $esconder = 'hidden';
    public $paciente_objeto;

    public function render()
    {
        return view('livewire.pacientes.contacto');
    }

    public function contacto($paciente_id){
        $this->esconder = '';
        $this->paciente_objeto = Paciente::where('id', $paciente_id)->first();

        if (!$this->paciente_objeto) {
            // Handle the case where the user is not found
            $this->salir();
        }
    }

    public function salir(){
        $this->esconder = 'hidden';
        return redirect()->route('pacientes');
    }
}
