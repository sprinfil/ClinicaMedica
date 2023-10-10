<?php

namespace App\Livewire\Pacientes;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Pacientes extends Component
{
    use WithPagination;
    public $filtroNombre = '';

    

    public function render()
    {
        $query = Paciente::query();

        if (!empty($this->filtroNombre)) {
            $query->where(DB::raw("CONCAT(nombre, ' ',apellido_1, ' ', apellido_2)"), 'LIKE', '%' . $this->filtroNombre . '%');
        }

        $pacientes = $query->orderBy('id')->paginate(8);
    
        return view('livewire.pacientes.pacientes', compact('pacientes'));
    }
    
    public function actualizarFiltroNombre()
    {
        $this->render();
    }


    public function editar($paciente_id){
        $this->dispatch('editar', ['paciente' => $paciente_id]);
    }

    public function eliminar($paciente_id){
        $this->dispatch('eliminar', ['paciente' => $paciente_id]);
    }

    public function contacto($paciente_id){
        $this->dispatch('contacto', ['paciente' => $paciente_id]);
    }
}
