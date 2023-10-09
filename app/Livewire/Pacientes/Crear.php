<?php

namespace App\Livewire\Pacientes;

use App\Models\Paciente;
use Livewire\Component;

class Crear extends Component
{
    public $esconder = 'hidden';

    //variables de creacion de pacientes
    public $nombre = '';
    public $apellido_1 = '';
    public $apellido_2 = '';
    public $correo = '';
    public $numero = '';
    public $fecha_nac = '';
    public $Genero = '';
    public $contacto_nombre = '';
    public $contacto_numero = '';
    public $contacto_correo = '';
    public $contacto_parentesco = '';

    public function render()
    {
        return view('livewire.pacientes.crear');
    }

    public function save()
    {
        
        $validated = $this->validate([ 
            'nombre' => 'required',
            'apellido_1' => 'required',
            'apellido_2' => 'required',
            'correo' => 'required',
            'numero' => 'required|min:10',
            'fecha_nac' => 'required',
            'Genero' => 'required',
            'contacto_nombre' => 'required',
            'contacto_numero' => 'required|min:10',
            'contacto_correo' => 'required',
            'contacto_parentesco' => 'required',
        ]);

        Paciente::create($validated);

        return redirect()->route('pacientes');
    }

    public function cancel(){
        $this->esconder = 'hidden';
        return redirect()->route('pacientes');
    }
}
