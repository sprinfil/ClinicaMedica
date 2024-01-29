<?php

namespace App\Livewire\Historials\HistoriaOdontologica;

use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\Usuario;
use Carbon\Carbon;
use Livewire\Component;

class Crear extends Component
{
    public $paciente;
    public $atendio;
    public $fecha;

    public $medicos;
    public $servicios;
    public $servicio_seleccionado;
    public $tabla_punto_venta;
    public $contador = 0;

    public function render()
    {
        return view('livewire.historials.historiaOdontologica.crear');
    }
    public function mount($paciente_id)
    {
        $this->paciente = Paciente::find($paciente_id);
        $this->atendio = session('usuario')->nombre;
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
                $this->contador = count($this->tabla_punto_venta);
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
                $this->tabla_punto_venta[$contador_temp]['$numero_servicio'] = $contador_temp;
                $contador_temp = $contador_temp + 1;
            }
        }
        $this->contador = count($this->tabla_punto_venta);
    }

}
