<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

use App\Models\Configuracion;
use App\Models\DetalleTratamiento;
use App\Models\Imagen;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On; 

class Editar extends Component
{
    public $paciente;
    public $tratamiento;
    public $fechaTratamiento;
    public $tratamientoNombre;
    public $nota;
    public $monto;
    public $imagenes;
    public $edit = false;
    public $lblBoton = "Editar";
    public $greenClass = "";

    public $dtFecha;
    public $txtAtendio;
    public $txtNotas;
    public $txtMetodoPago;
    public $txtMonto;
    public $metodo_pago;
    public $detalle_tratamiento;
    public $total;
    public $impuesto;
    public $total_impuesto;
    public $cambio;
    public $referencia_pago_tarjeta_debito;
    public $referencia_pago_tarjeta_credito;
    public $pago_con_mxn;
    public $pago_con_usd;
    public $cambio_mxn;
    public $imagenes_clinicas;
    public $imagenes_radiografias;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.editar');
    }

    public function Mount($tratamiento_id, $paciente_id){
        $this->tratamiento = Tratamiento::find($tratamiento_id);
        $this->paciente = Paciente::find($paciente_id);
        $this->fechaTratamiento = new Carbon($this->tratamiento->fecha);

        $this->nota = $this->tratamiento->nota;
        $this->monto = $this->tratamiento->monto;

        $this->imagenes = Imagen::where('tratamiento_id',$this->tratamiento->id)->get();
        $this->imagenes_clinicas = Imagen::where('tratamiento_id',$this->tratamiento->id)
        ->where('tipo','clinica')->get();
        $this->imagenes_radiografias = Imagen::where('tratamiento_id',$this->tratamiento->id)
        ->where('tipo','radiografia')->get();

      
        $this->dtFecha = $this->tratamiento->fecha;
        $this->txtMetodoPago = $this->tratamiento->metodo_pago;
        $this->txtAtendio = $this->tratamiento->atendio->nombre;
        $this->txtMonto = $this->tratamiento->monto;
        $this->txtNotas = $this->tratamiento->nota;
        $this->metodo_pago = $this->tratamiento->metodo_pago;

        $this->detalle_tratamiento = DetalleTratamiento::where('tratamiento_id',$this->tratamiento->id)->get();
        $this->total = $this->tratamiento->monto;
        $this->impuesto = ($this->metodo_pago == "DOLAR" ? $this->tratamiento->impuesto / Configuracion::first()->dolar : $this->tratamiento->impuesto);
        $this->total_impuesto = $this->tratamiento->monto + ($this->metodo_pago == "DOLAR" ? $this->tratamiento->impuesto / Configuracion::first()->dolar : $this->tratamiento->impuesto);
        $this->cambio = ($this->tratamiento->metodo_pago == "DOLAR" ? $this->tratamiento->pago_con_usd : $this->tratamiento->pago_con_mxn) - $this->total_impuesto;
        $this->referencia_pago_tarjeta_debito = $this->tratamiento->referencia_pago_tarjeta_debito;
        $this->referencia_pago_tarjeta_credito = $this->tratamiento->referencia_pago_tarjeta_credito;
        $this->pago_con_mxn = $this->tratamiento->pago_con_mxn;
        $this->pago_con_usd = 'USD ' . $this->tratamiento->pago_con_usd;
        $this->cambio_mxn = $this->cambio * Configuracion::first()->dolar;
    }

    public function toggleEdicion(){
        if($this->edit == false){
            //activar edicion
            $this->edit = true;
            $this->lblBoton = "Aceptar";
            $this->greenClass = "bg-green-500";
        }else{
            //aplicar edicion   
            $this->tratamiento->fecha = $this->dtFecha;
            $this->tratamiento->nota = $this->txtNotas;
            $imagenes_eliminar = Imagen::where('eliminar','si');
            $imagenes_eliminar->delete();

            $this->tratamiento->save();

            //reiniciar variables
            $this->greenClass = "";
            $this->edit = false;
            $this->lblBoton = "Editar";
            return redirect(route('historia_odontologica_editar',['tratamiento_id'=>$this->tratamiento->id,'paciente_id'=>$this->paciente->id]));
        }

    }

    public function advertencia($imagen_id){
        $this->dispatch('advertencia', ['imagen_id' => $imagen_id]);  
    }

    #[On('EliminarImagen')] 
    public function actualizarImagenes($id){
        //eliminar imagen
        $imagen = Imagen::find($id);
        $imagen->eliminar = "si";
        $imagen->save();
        $this->imagenes = Imagen::where('tratamiento_id',$this->tratamiento->id)->get();
    }

    public function TratamientoEliminar(){
        $this->dispatch('advertenciaTratamientoEliminar', data: ['tratamiento_id' => $this->tratamiento->id, 'paciente_id' => $this->paciente->id]);
    }
}
