<?php

namespace App\Livewire\Historials;

use Livewire\Component;
use App\Models\Paciente;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class HistorialMedico extends Component
{
    use WithPagination;
    public $filtroNombre = '';
    
    public function render()
    {
        $query = Paciente::query();

        if (!empty($this->filtroNombre)) {
            $query->where(DB::raw("CONCAT(nombre, ' ',apellido_1, ' ', apellido_2)"), 'LIKE', '%' . $this->filtroNombre . '%');
        }

        $pacientes = $query->orderBy('id')->paginate(10);
        
        return view('livewire.historials.historial-medico', ['pacientes' => $pacientes]);
    }

    public function actualizarFiltroNombre()
    {
        $this->render();
    }

    public function historial_clinico($paciente_id){
        return redirect()->route('historia-clinica', ['paciente_id' => $paciente_id]);
    }

    public function historia_odontologica($paciente_id){
        return redirect(route('historia_odontologica',['paciente_id' => $paciente_id]));
    }

    public function expediente($paciente_id){
        return redirect(route('expediente',['paciente_id' => $paciente_id]));
    }
}
