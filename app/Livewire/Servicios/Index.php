<?php

namespace App\Livewire\Servicios;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class Index extends Component
{
    use WithPagination;
    public $nombreFiltro;

    public $servicio;
    public $nombre;
    public $precio;

    public function render()
    {
        $query = Servicio::query();
      
        if ($this->nombre) {
            $query->where('nombre', 'like', '%' . $this->nombre . '%');
        }

        $servicios = $query->orderBy('id')->paginate(8);

        return view('livewire.servicios.index', ['servicios' => $servicios]);
    }

    public function actualizarFiltroServicio()
    {
        $this->render();
    }

    #[On('mount')] 
    public function mount(){
    
    }

    public function editar($servicio_id){
        $this->dispatch('editar', ['servicio' => $servicio_id]);
    }

    public function eliminar($servicio_id){
        $this->dispatch('eliminar', ['servicio' => $servicio_id]);
    }
}
