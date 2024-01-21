<?php

namespace App\Livewire\Configuracion;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Configuracion;

class Index extends Component
{
    public $configuracion;

    //citas
    public $horario_inicio;
    public $horario_final;

    //monedas
    public $dolar;
    public $impuesto;



    public function render()
    {
        return view('livewire.configuracion.index');
    }

    public function mount(){
        $this->configuracion = Configuracion::first();
        $this->horario_inicio = Carbon::createFromFormat('H:i:s', $this->configuracion->horario_inicio)->format('H:i:s');
        $this->horario_final = Carbon::createFromFormat('H:i:s', $this->configuracion->horario_final)->format('H:i:s');
        $this->dolar = $this->configuracion->dolar;
        $this->impuesto = $this->configuracion->impuesto;
    }

    public function configuracion_citas_guardar(){

        if($this->horario_inicio > $this->horario_final ){
            $this->dispatch('fechas_incorrectas');
        }else{
            $this->configuracion->horario_inicio = $this->horario_inicio;
            $this->configuracion->horario_final = $this->horario_final;
            $this->configuracion->save();
            $this->dispatch('horario_succes');
        }
    }

    public function configuracion_moneda_guardar(){
        $this->configuracion->dolar = $this->dolar;
        $this->configuracion->impuesto = $this->impuesto;
        $this->configuracion->save();
        $this->dispatch('moneda_succes');
    }
}
