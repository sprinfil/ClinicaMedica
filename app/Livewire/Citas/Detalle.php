<?php

namespace App\Livewire\Citas;

use Carbon\Carbon;
use App\Models\Cita;
use Livewire\Component;
use App\Models\Paciente;
use Livewire\Attributes\On; 

class Detalle extends Component
{
    public $paciente;
    public $hora ;
    public $nombreDia ;
    public $year;
    public $mes;
    public $dia;
    public $fecha;
    public $cita;
    public $esconder = "hidden";
    public $esconder_error = "hidden";
    public $hora_inicio;
    public $hora_fin;
    public $atiende;
    public $tratamiento;


    public function render()
    {
        return view('livewire.citas.detalle');
    }

    #[On('show_detalle')] 
    public function show_detalle($data){
        $this->datos = $data;
        $this->esconder = '';

        $this->nombreDia = $data['nombreDia'];
        $this->year = $data['year'];
        $this->mes = $data['mes'];
        $this->dia = $data['dia'];
        $this->fecha = $data['fecha'];
        $this->cita = Cita::find($data['cita_id']);
        $this->paciente = $this->cita->pacientee->getFullNombre($this->cita->pacientee->id);
        $this->hora_inicio = Carbon::createFromFormat('h:i:s', $this->cita->hora_inicio)->format('h:i A');
        $this->hora_fin = Carbon::createFromFormat('h:i:s', $this->cita->hora_fin)->addMinutes(15)->format('h:i A');
        $this->atiende = $this->cita->atiendee->nombre;
        $this->tratamiento = $this->cita->tratamiento;
    }
    
    public function cancelar_cita(){
        $this->dispatch('cancelar_cita_detalle', cita_id:$this->cita->id);
    }
    public function mount(){

    }

    public function salir(){
        $this->esconder = 'hidden';
    }

    #[On('cerrar_detalle')] 
    public function cerrar(){
        $this->nombreDia = '';
        $this->year = '';
        $this->mes = '';
        $this->dia = '';
        $this->fecha = '';
        $this->cita = '';
        $this->paciente = '';
        $this->hora_inicio = '';
        $this->hora_fin = '';
        $this->atiende = '';
        $this->tratamiento = '';
        $this->esconder = 'hidden';
    }
    public function confirmar_cita(){
        if($this->cita->confirmada){
            $this->cita->confirmada = false;
        }else{
            $this->cita->confirmada = true;
        }
        $this->cita->save();
        
        $this->dispatch('refrescar_citas');
    }
}
