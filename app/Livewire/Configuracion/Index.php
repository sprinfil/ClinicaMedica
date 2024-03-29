<?php

namespace App\Livewire\Configuracion;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Configuracion;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $configuracion;

    //citas
    public $horario_inicio;
    public $horario_final;

    //monedas
    public $dolar;
    public $impuesto;
    public $empresa_nombre;

    public $signatureImage;

    public function render()
    {
        return view('livewire.configuracion.index');
    }

    public function mount(){
        $this->configuracion = Configuracion::first();
        $this->horario_inicio = Carbon::createFromFormat('H:i:s', $this->configuracion->horario_inicio ?? '00:00:00')->format('H:i:s');
        $this->horario_final = Carbon::createFromFormat('H:i:s', $this->configuracion->horario_final ?? '00:00:00')->format('H:i:s');
        $this->dolar = $this->configuracion->dolar ?? 0;
        $this->impuesto = $this->configuracion->impuesto ?? 0;
        $this->empresa_nombre =  $this->configuracion->nombre_empresa ?? 'SurCodeMedics';
    }

    public function configuracion_citas_guardar(){

        if($this->horario_inicio > $this->horario_final ){
            $this->dispatch('fechas_incorrectas');
        }else{
            if ($this->configuracion == null){
                $this->nuevaConfiguracion();
            }

            $this->configuracion->horario_inicio = $this->horario_inicio;
            $this->configuracion->horario_final = $this->horario_final;
            $this->configuracion->save();
            $this->dispatch('horario_succes');
        }
    }

    public function configuracion_moneda_guardar(){
        if ($this->configuracion == null){
            $this->nuevaConfiguracion();
        }

        $this->configuracion->dolar = $this->dolar;
        $this->configuracion->impuesto = $this->impuesto;
        $this->configuracion->save();
        $this->dispatch('moneda_succes');
    }

    public function nuevaConfiguracion(){
        $configuracion = new Configuracion();
        $configuracion->horario_inicio = $this->horario_inicio ?? '00:00:00';
        $configuracion->horario_final = $this->horario_final ?? '00:00:00';
        $configuracion->dolar = $this->dolar ?? 0;
        $configuracion->impuesto = $this->impuesto ?? 0;
        $configuracion->save();

        $this->configuracion = Configuracion::find($configuracion->id);

        $this->configuracion->horario_inicio = $configuracion->horario_inicio;
        $this->configuracion->horario_final = $configuracion->horario_final;
        $this->configuracion->dolar = $configuracion->dolar;
        $this->configuracion->impuesto = $configuracion->impuesto;
    }

    public function aplicar_nombre_empresa(){
        if($this->empresa_nombre != null){
            $this->configuracion->nombre_empresa = $this->empresa_nombre;
            $this->configuracion->save();
            $this->dispatch('nombre_empresa_succes');
        }
    }

    public function saveFirma()
    {
        try {
            $image = $this->signatureImage; // Esto es la base64 de la imagen
            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);
            $image = base64_decode($image);
            $imageName = 'firmas/firma.png';
            Storage::disk('public')->put($imageName, $image);    
    
            $this->dispatch('firma_success');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
