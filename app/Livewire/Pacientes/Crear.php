<?php

namespace App\Livewire\Pacientes;

use App\Models\Paciente;
use DateTime;
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
    public $Genero = 'Masculino';
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
        $this->validate([ 
            'nombre' => 'required',
            /*
            'apellido_1' => 'required',
            'apellido_2' => 'required',
            'correo' => 'required',
            'fecha_nac' => 'required',
            'numero' => 'required|min:10',
            'contacto_nombre' => 'required',
            'contacto_numero' => 'required|min:10',
            'contacto_correo' => 'required',
            'contacto_parentesco' => 'required',
            */
        ]);

        $fecha_nac = new DateTime($this->fecha_nac);
        $data = [
            'nombre'=> $this->nombre,
            'apellido_1' => $this->apellido_1,
            'apellido_2' => $this->apellido_2,
            'correo' => $this->correo,
            'numero' => $this->numero,
            'fecha_nac' => $fecha_nac->format('Y-m-d'),
            'Genero' => $this->Genero,
            'contacto_nombre' => $this->contacto_nombre,
            'contacto_numero' => $this->contacto_numero,
            'contacto_correo' => $this->contacto_correo,
            'contacto_parentesco' => $this->contacto_parentesco,
        ];
        Paciente::create($data);

        return redirect()->route('pacientes');
    }

    public function cancel(){
        $this->esconder = 'hidden';
        return redirect()->route('pacientes');
    }
}
