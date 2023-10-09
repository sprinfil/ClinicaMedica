<?php

namespace App\Livewire\Pacientes;

use App\Models\Paciente;
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
            $query->where('nombre', 'LIKE', '%' . $this->filtroNombre . '%');
        }
    
        $pacientes = $query->orderBy('id')->paginate(10);
    
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
}
