<?php

namespace App\Livewire\Pacientes;

use App\Models\Paciente;
use Livewire\Component;

class Editar extends Component
{
    protected $listeners = ['editar'];
    public $esconder = 'hidden';
    public $paciente_objeto;

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
        return view('livewire.pacientes.editar');
    }

    public function editar($paciente_id){
        $this->esconder = '';
        $this->paciente_objeto = Paciente::where('id', $paciente_id)->first();
        
        $this->nombre =  $this->paciente_objeto->nombre;
        $this->apellido_1 =  $this->paciente_objeto->apellido_1;
        $this->apellido_2 =  $this->paciente_objeto->apellido_2;
        $this->correo =  $this->paciente_objeto->correo;
        $this->numero =  $this->paciente_objeto->numero;
        $this->fecha_nac =  $this->paciente_objeto->fecha_nac;
        $this->Genero =  $this->paciente_objeto->Genero;
        $this->contacto_nombre =  $this->paciente_objeto->contacto_nombre;
        $this->contacto_numero =  $this->paciente_objeto->contacto_numero;
        $this->contacto_correo =  $this->paciente_objeto->contacto_correo;
        $this->contacto_parentesco =  $this->paciente_objeto->contacto_parentesco;
    }


    public function cerrar(){
        $this->esconder = 'hidden';
        return redirect('pacientes');
    }

    public function save(){
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
    
        $this->paciente_objeto->nombre =  $this->nombre;
        $this->paciente_objeto->apellido_1 =  $this->apellido_1;
        $this->paciente_objeto->apellido_2 =  $this->apellido_2;
        $this->paciente_objeto->correo =  $this->correo;
        $this->paciente_objeto->numero =  $this->numero;
        $this->paciente_objeto->fecha_nac =  $this->fecha_nac;
        $this->paciente_objeto->Genero =  $this->Genero;
        $this->paciente_objeto->contacto_nombre =  $this->contacto_nombre;
        $this->paciente_objeto->contacto_numero =  $this->contacto_numero;
        $this->paciente_objeto->contacto_correo =  $this->contacto_correo;
        $this->paciente_objeto->contacto_parentesco =  $this->contacto_parentesco;
    
        $this->paciente_objeto->save();
    
        Editar::cerrar();
    }

}
