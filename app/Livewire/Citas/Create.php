<?php

namespace App\Livewire\Citas;

use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Usuario;
use Livewire\Component;
use App\Models\Paciente;
use Livewire\Attributes\On; 
use App\Models\Configuracion;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class Create extends Component
{
    public $esconder = "hidden";
    public $hora_inicio;
    public $nombreDia;
    public $year;
    public $mes;
    public $dia;
    public $filtroNombre;

    public $selected_paciente;
    public $pacientes;
    public $medicos;
    public $filtroNombreUsuario;
    public $selected_atiende;
    public $tratamiento;
    public $fecha;
    public $duracion_cita;
    public $paciente_seleccionado;
    public $citas;
    public $esconder_error ="hidden";

    public function render()
    {
        $query = Paciente::query();
        $queryMedicos = Usuario::query();

        if (!empty($this->filtroNombre)) {
            $query->where(DB::raw("CONCAT(nombre, ' ',apellido_1, ' ', apellido_2)"), 'LIKE', '%' . $this->filtroNombre . '%');
        }
        if(!empty($this->filtroNombreUsuario)) {
            $queryMedicos->where(DB::raw("CONCAT(nombre, ' ',apellido_1, ' ', apellido_2)"), 'LIKE', '%' . $this->filtroNombreUsuario . '%');
        }
        $queryMedicos->where('Puesto', 'Medico');
        $queryMedicos->where('status','ACTIVO');

        $this->pacientes = $query->orderBy('id')->get();
        $this->medicos = $queryMedicos->get();
        if(count($this->pacientes) == 1){
            $this->selected_paciente = $this->pacientes[0]->id;
        }
        if(count($this->medicos) == 1){
            $this->selected_atiende = $this->medicos[0]->id;

        }

        return view('livewire.citas.create');
    }

    #[On('show')] 
    public function show($data){
        $this->pacientes = Paciente::All();
        $this->esconder = '';
        $this->hora_inicio = $data['hora_inicio'];
        $this->nombreDia = $data['nombreDia'];
        $this->year = $data['year'];
        $this->mes = $data['mes'];
        $this->dia = $data['dia'];
        $this->fecha = $data['fecha'];
        $this->duracion_cita = "60";
        if(count($this->pacientes) > 0){
            $this->selected_paciente = $this->pacientes->first()->id;
        }
        if(count($this->medicos) > 0){
            $this->selected_atiende = $this->medicos->first()->id;
        }
        $this->citas = Cita::all();
        $this->esconder_error ="hidden";
    }

    public function salir(){
        $this->esconder = 'hidden';
    }

    public function actualizarFiltroNombre(){  
        $this->render();
    }

    public function actualizarFiltroNombreUsuario(){
        $this->render();
    }

    public function save(){
        $this->validate([ 
            'selected_paciente' => 'required',
            'selected_atiende' => 'required',
        ]);

        $hora_inicio = Carbon::createFromFormat('h:i A', $this->hora_inicio);
        $hora_i =  Carbon::createFromFormat('h:i A', $this->hora_inicio);
        $hora_fin = $hora_i->addMinutes(intval($this->duracion_cita) - 15);
        $horario_ocupado = false;

        $configuracion = Configuracion::first();

        //$hora_fin_confirguracion = Carbon::createFromFormat('H:i:s', '1:00 PM');
        $hora_fin_confirguracion = Carbon::createFromFormat('H:i:s', $configuracion->horario_final);
  
        foreach($this->citas as $cita){
            if((($hora_inicio->format('H:i:s') < $cita->hora_inicio && $hora_fin->format('H:i:s') >= $cita->hora_inicio) && $this->fecha == $cita->fecha) || $hora_fin > $hora_fin_confirguracion){
                $this->esconder_error ="";
                $horario_ocupado = true;
            }
        }


        if(!$horario_ocupado){
            $data = [
                'fecha'=> $this->fecha,
                'paciente' => intval($this->selected_paciente),
                'atiende' => intval($this->selected_atiende),
                'hora_inicio'=> $hora_inicio->format('H:i:s'),
                'hora_fin'=> $hora_fin->format('H:i:s'),
                'agendo' =>  session('usuario')->id,
            ];
    
            Cita::create($data);
            $this->esconder_error ="hidden";
            $this->esconder = "hidden";
            $this->dispatch('refrescar_citas');
        }

    }

    public function actualizar_paciente_seleccionado(){
        $paciente = Paciente::find($this->selected_paciente);
        $this->paciente_seleccionado = $paciente->getFullNombre($paciente->id);
    }
}
