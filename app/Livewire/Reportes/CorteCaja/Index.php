<?php

namespace App\Livewire\Reportes\CorteCaja;

use Carbon\Carbon;
use App\Models\Corte;
use Livewire\Component;
use App\Models\Tratamiento;
use Livewire\Attributes\On; 
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;


    public $selected_corte;
    public function render()
    {
        $cortes = Corte::orderby('fecha','desc')->paginate(10);


        if($this->selected_corte){
            $tratamientos = Tratamiento::whereDate('fecha',$this->selected_corte->fecha)->get();
        }else{
            $tratamientos = null;
        }
        return view('livewire.reportes.corte_caja.index',compact('tratamientos','cortes'));
    }

    public function mount(){

        $this->selected_corte = Corte::orderby('fecha','desc')->first();
    }   

    public function select_corte($corte_id){
        $this->selected_corte =  Corte::find($corte_id);  
    }

    public function create_corte_alert(){
        $this->dispatch('create_corte_alert');
    }

    #[On('validar_corte')] 
    public function validar_corte(){
        $corte = Corte::whereDate('fecha',Carbon::now()->toDateString())->first();
        if($corte){
            $this->dispatch('existe_corte');
        }else{
            $this->create_corte();
        }

    }

    #[On('create_corte')] 
    public function create_corte(){
        $corte_eliminar = Corte::whereDate('fecha',Carbon::now()->toDateString());
        if($corte_eliminar){
            $corte_eliminar->delete();
        }

        $efectivo = Tratamiento::total_efectivo(Carbon::now()->toDateString());
        $tarjeta = Tratamiento::total_tarjeta(Carbon::now()->toDateString());

        $corte = new Corte();

        $corte->usuario_id = session('usuario')->id;
        $corte->fecha = Carbon::now()->toDateString();

        $corte->efectivo = $efectivo;
        $corte->tarjeta = $tarjeta;

        $corte->dolares = 0;
        $corte->cheques = 0;

        $corte->total = $efectivo + $tarjeta;

        $corte->save();
        $this->mount();
        $this->render();
        $this->dispatch('created_corte');
    }

    public function open_tratamiento($paciente_id, $tratamiento_id){
        redirect(route('historia_odontologica_editar',['paciente_id' => $paciente_id, 'tratamiento_id' => $tratamiento_id]));
    }
}
