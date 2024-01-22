<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

use App\Models\Paciente;
use App\Models\Tratamiento;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class HistoriaOdontologica extends Component
{
    use WithPagination;
    public $paciente;
    public $fecha_nacimiento;
    public $edad;
    public $esconder = "hidden";
    public $verinfo = false;

    public function render()
    {   
        $tratamientos = Tratamiento::where('paciente_id',$this->paciente->id)->orderby('fecha','desc')->paginate(10);
        return view('livewire.historials.historiaOdontologica.historia-odontologica',compact('tratamientos'));
    }
    public function mount($paciente_id){
        $this->paciente = Paciente::find($paciente_id);
        $this->fecha_nacimiento = Carbon::parse($this->paciente->fecha_nac);
        $this->edad = $this->fecha_nacimiento->age;
    }
    
    public function historia_odontologica_create($paciente_id){
        return redirect(route('historia_odontologica_create',['paciente_id' => $paciente_id]));
    }

    public function editar($tratamiento_id){
        return redirect(route('historia_odontologica_editar',['tratamiento_id'=>$tratamiento_id,'paciente_id'=>$this->paciente->id]));
    }

    public function toggleVerInfo(){
        if(!$this->verinfo){
            $this->esconder = "";
            $this->verinfo = true;
        }else{
            $this->esconder = "hidden";
            $this->verinfo = false;
        }

    }

}
