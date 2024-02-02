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
    public $baja_usuario;
    public $activar_usuario;

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
        $this->baja_usuario = Usuario::find($usuario_id);
        $this->dispatch('desactivar_advertvencia');
    }

    #[On('baja_usuario')] 
    public function baja_usuario(){
        $usuario = Usuario::find($this->baja_usuario->id);
        $usuario->status = 'BAJA';
        $usuario->save();
    }

    public function actualizarFiltroNombre(){
        $this->render();
    }

    public function activar($usuario_id){
        $this->activar_usuario = Usuario::find($usuario_id);
        $this->dispatch('activar_advertvencia');
    }

    
    #[On('activar_usuario')] 
    public function activar_usuario(){
        $usuario = Usuario::find($this->activar_usuario->id);
        $usuario->status = 'ACTIVO';
        $usuario->save();
    }
}
