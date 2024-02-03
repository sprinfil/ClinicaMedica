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
      
        if ($this->nombreFiltro) {
            $query->where('nombre', 'like', '%' . $this->nombreFiltro . '%');
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

    public $servicio_deshabilitar;
    public $servicio_habilitar;

    public function deshabilitar($servicio_id){
        $this->servicio_deshabilitar = Servicio::findOrfail($servicio_id);
        $this->dispatch('deshabilitar_advertencia');
    }

    #[On('deshabilitar_servicio')] 
    public function deshabilitar_servicio(){
        $this->servicio_deshabilitar->status = 'INACTIVO';
        $this->servicio_deshabilitar->save();
    }
    public function habilitar($servicio_id){
        $this->servicio_habilitar = Servicio::findOrfail($servicio_id);
        $this->dispatch('habilitar_advertencia');
    }

    #[On('habilitar_servicio')] 
    public function habilitar_servicio(){
        $this->servicio_habilitar->status = 'ACTIVO';
        $this->servicio_habilitar->save();
    }
}
