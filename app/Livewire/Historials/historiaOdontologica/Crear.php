<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

use Carbon\Carbon;
use App\Models\Usuario;
use Livewire\Component;
use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\Tratamiento;
use App\Models\DetalleTratamiento;

class Crear extends Component
{
    public $paciente;
    public $atendio;
    public $fecha;
    public $fecha_mostrar;

    public $medicos;
    public $servicios;
    public $servicio_seleccionado;
    public $tabla_punto_venta;
    public $contador = 0;
    public $total = 0;
    public $generar_ticket = true;
    public $nota;
    public $metodo_pago;
    public $error;
    public $pago_con;
    public $cambio;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.crear');
    }
    public function mount($paciente_id)
    {
        $this->paciente = Paciente::find($paciente_id);
        $this->fecha = Carbon::now()->format('d-m-Y h:i A');
        $this->medicos = Usuario::medicos();
        $this->servicios = Servicio::all();
    }

    public function agregar_servicio()
    {
        $servicio = Servicio::find($this->servicio_seleccionado);
        $encontrado = false;

        if ($servicio) {
            if ($this->tabla_punto_venta != null) {
                for ($i = 0; $i < count($this->tabla_punto_venta); $i++) {
                    if ($servicio->nombre == $this->tabla_punto_venta[$i]['nombre']) {
                        $this->tabla_punto_venta[$i]['cantidad'] += 1;
                        $this->tabla_punto_venta[$i]['total'] = $servicio->precio * $this->tabla_punto_venta[$i]['cantidad'];
                        $encontrado = true;
                        $this->calcular_total();
                    }
                }
            } else {
                $this->tabla_punto_venta[$this->contador]['nombre'] = $servicio->nombre;
            }

            if (!$encontrado) {
                $this->tabla_punto_venta[$this->contador]['nombre'] = $servicio->nombre;
                $this->tabla_punto_venta[$this->contador]['cantidad'] = 1;
                $this->tabla_punto_venta[$this->contador]['unitario'] = $servicio->precio;
                $this->tabla_punto_venta[$this->contador]['total'] = $servicio->precio;
                $this->tabla_punto_venta[$this->contador]['numero_servicio'] = $this->contador;
                $this->tabla_punto_venta[$this->contador]['servicio_id'] = $servicio->id;
                $this->contador = count($this->tabla_punto_venta);
                $this->calcular_total();
            }
        }
    }

    public function ver_tabla()
    {
        dd($this->tabla_punto_venta);
    }

    public function quitar_servicio($numero_servicio)
    {
        $servicios_temp = $this->tabla_punto_venta;
        $contador_temp = 0;
        $this->tabla_punto_venta = array();
    
        for($i = 0 ; $i < $this->contador ; $i ++){
            if($servicios_temp[$i]['numero_servicio'] != $numero_servicio){
                $this->tabla_punto_venta[$contador_temp] = $servicios_temp[$i];
                $this->tabla_punto_venta[$contador_temp]['numero_servicio'] = $contador_temp;
                $contador_temp = $contador_temp + 1;
            }
        }
        $this->contador = count($this->tabla_punto_venta);
        $this->calcular_total();
    }

    public function calcular_total(){
        $this->total = 0;
        for($i = 0 ; $i < $this->contador ; $i ++){
            $this->total += $this->tabla_punto_venta[$i]['total'];
        }
        $this->actualizar_cambio();
    }

    public function generar_tratamiento(){
        if($this->tabla_punto_venta != null && $this->atendio != null && $this->metodo_pago != null){
            $tratamiento = new Tratamiento;
            $tratamiento->fecha = Carbon::now()->format('Y-m-d h:i:s');
            $tratamiento->nota = $this->nota;
            $tratamiento->monto = $this->total;
            $tratamiento->metodo_pago = $this->metodo_pago;
            $tratamiento->usuario_id = $this->atendio;
            $tratamiento->paciente_id = $this->paciente->id;
            $tratamiento->pago_con = $this->pago_con;
            $tratamiento->save();
    
            for($i = 0 ; $i < $this->contador ; $i ++){
                $detalle_tratamiento = new DetalleTratamiento();
                $detalle_tratamiento->tratamiento_id = $tratamiento->id;
                $detalle_tratamiento->servicio_id = $this->tabla_punto_venta[$i]['servicio_id'];
                $detalle_tratamiento->cantidad = $this->tabla_punto_venta[$i]['cantidad'];
                $detalle_tratamiento->save();
            }   
            return redirect(route('historia_odontologica_imagen',['paciente_id' => $this->paciente->id,'tratamiento_id' => $tratamiento->id]));
        }else{
            $this->error = true;
        }
    }

    public function actualizar_metodo_pago(){
        $this->render();
    }

    public function actualizar_cambio(){
        if($this->pago_con != null){
            $this->cambio = $this->pago_con - $this->total;
        }else{
            $this->cambio = 0;
        }
        $this->render();
    }

}
