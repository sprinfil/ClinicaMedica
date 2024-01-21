<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 
class Usuarios extends Component
{

    use WithPagination;
    public $usuario;
    public $FiltroNombre;

    public function render()
    {
        $query = Usuario::query();

        if (!empty($this->FiltroNombre)) {
            $query->where(DB::raw("CONCAT(nombre, ' ',apellido_1, ' ', apellido_2)"), 'LIKE', '%' . $this->FiltroNombre . '%');
        }

        $usuarios = $query->orderBy('id')->paginate(8);
        return view('livewire.usuarios.usuarios',compact('usuarios'));
    }

    #[On('mount')] 
    public function mount(){

    }

 

    public function editar($usuario_id){
        $this->dispatch('editar', ['usuario' => $usuario_id]);
    }

    public function eliminar($usuario_id){
        $this->dispatch('eliminar', ['usuario' => $usuario_id]);
    }

    public function actualizarFiltroNombre(){
        $this->render();
    }
}
