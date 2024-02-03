<?php

namespace App\Livewire\Reportes\CorteCaja;

use App\Models\Configuracion;
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
    public $impuestos_cobrados = 0;
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
        if( $this->selected_corte ){
            $this->impuestos_cobrados = $this->selected_corte->total_neto * (Configuracion::first()->impuesto / 100);
        }
    }   

    public function select_corte($corte_id){
        $this->selected_corte =  Corte::find($corte_id);  
        $this->impuestos_cobrados = $this->selected_corte->total_neto * (Configuracion::first()->impuesto / 100);
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

        $efectivo_con_impuestos = Tratamiento::total_efectivo_con_impuestos(Carbon::now()->toDateString());
        $tarjeta_credito_con_impuestos = Tratamiento::total_tarjeta_credito_con_impuestos(Carbon::now()->toDateString());
        $tarjeta_debito_con_impuestos = Tratamiento::total_tarjeta_debito_con_impuestos(Carbon::now()->toDateString());
        $dolares_con_impuestos = Tratamiento::total_dolares_con_impuestos(Carbon::now()->toDateString());

        $efectivo_sin_impuestos = Tratamiento::total_efectivo_sin_impuestos(Carbon::now()->toDateString());
        $tarjeta_credito_sin_impuestos = Tratamiento::total_tarjeta_credito_sin_impuestos(Carbon::now()->toDateString());
        $tarjeta_debito_sin_impuestos = Tratamiento::total_tarjeta_debito_sin_impuestos(Carbon::now()->toDateString());
        $dolares_sin_impuestos = Tratamiento::total_dolares_sin_impuestos(Carbon::now()->toDateString());

        $corte = new Corte();

        $corte->usuario_id = session('usuario')->id;
        $corte->fecha = Carbon::now()->toDateString();
        
        $corte->subtotal = $efectivo_sin_impuestos +  $tarjeta_credito_sin_impuestos +  $tarjeta_debito_sin_impuestos + ($dolares_sin_impuestos * Configuracion::first()->dolar);
        $corte->total =  $efectivo_con_impuestos + $tarjeta_credito_con_impuestos +   $tarjeta_debito_con_impuestos +  ($dolares_con_impuestos * Configuracion::first()->dolar);

        $corte->efectivo_subtotal = $efectivo_sin_impuestos;
        $corte->efectivo_impuestos = Tratamiento::efectivo_impuestos(Carbon::now()->toDateString());

        $corte->dolares_subtotal = $dolares_sin_impuestos;
        $corte->dolares_impuestos = Tratamiento::dolares_impuestos(Carbon::now()->toDateString());

        $corte->tarjeta_credito_subtotal = $tarjeta_credito_sin_impuestos;
        $corte->tarjeta_credito_impuestos = Tratamiento::tarjeta_credito_impuestos(Carbon::now()->toDateString());

        $corte->tarjeta_debito_subtotal = $tarjeta_debito_sin_impuestos;
        $corte->tarjeta_debito_impuestos = Tratamiento::tarjeta_debito_impuestos(Carbon::now()->toDateString());

        $corte->total_impuestos = Tratamiento::efectivo_impuestos(Carbon::now()->toDateString())
         + (Tratamiento::dolares_impuestos(Carbon::now()->toDateString()) * Configuracion::first()->dolar) +
         Tratamiento::tarjeta_credito_impuestos(Carbon::now()->toDateString()) + 
         Tratamiento::tarjeta_debito_impuestos(Carbon::now()->toDateString());

/*
     $corte->efectivo = $efectivo;
        $corte->tarjeta_credito = $tarjeta_credito;
        $corte->tarjeta_debito = $tarjeta_debito;
        $corte->dolares = $dolares;

        $total_neto = $efectivo + $tarjeta_credito + $tarjeta_debito + ($dolares * Configuracion::first()->dolar);

        $corte->total_neto = $total_neto;
        $corte->total_bruto = $total_neto - ($total_neto * (Configuracion::first()->impuesto/100));
*/
   

        $corte->save();
        $this->mount();
        $this->render();
        $this->dispatch('created_corte');
    }

    public function open_tratamiento($paciente_id, $tratamiento_id){
        redirect(route('historia_odontologica_editar',['paciente_id' => $paciente_id, 'tratamiento_id' => $tratamiento_id]));
    }
}
