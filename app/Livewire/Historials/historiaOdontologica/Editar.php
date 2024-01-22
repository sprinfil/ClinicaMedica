<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

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
    public $txtTratamiento;
    public $txtAtendio;
    public $txtNotas;
    public $txtMetodoPago;
    public $txtMonto;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.editar');
    }

    public function Mount($tratamiento_id, $paciente_id){
        $this->tratamiento = Tratamiento::find($tratamiento_id);
        $this->paciente = Paciente::find($paciente_id);

        $this->fechaTratamiento = new Carbon($this->tratamiento->fecha);

 
        $this->tratamientoNombre = $this->tratamiento->tratamiento;
        $this->nota = $this->tratamiento->nota;
        $this->monto = $this->tratamiento->monto;

        $this->imagenes = Imagen::where('tratamiento_id',$this->tratamiento->id)->get();

        //inputs
        $this->dtFecha = $this->tratamiento->fecha;
        $this->txtMetodoPago = $this->tratamiento->metodo_pago;
        $this->txtTratamiento = $this->tratamiento->tratamiento;
        $this->txtAtendio = $this->tratamiento->atendio->nombre;
        $this->txtMonto = $this->tratamiento->monto;
        $this->txtNotas = $this->tratamiento->nota;

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
            $this->tratamiento->tratamiento = $this->txtTratamiento;
            $this->tratamiento->nota = $this->txtNotas;
            $this->tratamiento->metodo_pago =  $this->txtMetodoPago;
            $this->tratamiento->monto = $this->txtMonto;
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
