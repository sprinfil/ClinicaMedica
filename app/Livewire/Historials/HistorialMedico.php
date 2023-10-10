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

        $pacientes = $query->orderBy('id')->paginate(8);
        
        return view('livewire.historials.historial-medico', ['pacientes' => $pacientes]);
    }

    public function actualizarFiltroNombre()
    {
        $this->render();
    }
}
