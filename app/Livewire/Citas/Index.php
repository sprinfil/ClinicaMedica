<?php

namespace App\Livewire\Citas;

use DateTime;
use Carbon\Carbon;
use App\Models\Cita;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class Index extends Component
{
    use WithPagination;
    public $FechaPicker;
    public $dias;
    public $fecha;
    public $nombreMes;
    public $horas;
    public $horas_bd;
    public $citas;
    public $citas_disponibles_ocupadas;
    public $cita_eliminar;



    public function render()
    {
    
        $citas_ordenadas = Cita::orderby('fecha','asc')
        ->orderby('hora_inicio','asc')
        ->where('fecha','>=',Carbon::now()->toDateString())->paginate(10);

        
        return view('livewire.citas.index',compact('citas_ordenadas'));
    }

    public function mount()
    {
        $this->dias = array();
        Carbon::setLocale('es');
        $this->FechaPicker = Carbon::now()->toDateString();
        $this->actualizarFecha();
        $this->config_horas();
        $this->citas = Cita::All();
        $this->fechas_ocupadas();
        //dd($this->citas_disponibles_ocupadas);

    }

    public function actualizar(){
        $this->actualizarFecha();
        $this->config_horas();
        $this->citas = Cita::All();
        $this->fechas_ocupadas();
    }

    //actualizar fecha al cambiar de fecha en el picker
    public function actualizarFecha()
    {
        $this->fecha = new Carbon($this->FechaPicker);
        $this->mostrar_dias($this->fecha);
        $this->fechas_ocupadas();
    }

    //poner la fecha al dia de hoy
    public function reset_fecha()
    {
        $this->FechaPicker = Carbon::now()->toDateString();
        $this->actualizarFecha();
    }

    //aumentar 1 semana al picker
    public function avanzar_fecha()
    {
        $this->fecha = new Carbon($this->FechaPicker);
        //$this->fecha = $this->fecha->addWeek();
        $this->fecha = $this->fecha->addDays(1);
        $this->FechaPicker = $this->fecha->format('Y-m-d');
        $this->mostrar_dias($this->fecha);
        $this->fechas_ocupadas();
    }

    //retroceder 1 semana al picker
    public function retroceder_fecha()
    {
        $this->fecha = new Carbon($this->FechaPicker);
        //$this->fecha = $this->fecha->subWeek();
        $this->fecha = $this->fecha->subDays(1);
        $this->FechaPicker = $this->fecha->format('Y-m-d');
        $this->mostrar_dias($this->fecha);
        $this->fechas_ocupadas();
    }

    //mostrar los dias de la semana
    public function mostrar_dias($fecha)
    {
        for ($i = 0; $i < 7; $i++) {
            $this->dias[$i] = new Carbon($fecha);
            $fecha = $fecha->modify('+1 day');
        }
    }

    //configurar hotas
    public function config_horas()
    {
        $ctr = 0;
        $hora_inicial = Carbon::createFromTime(9, 0, 0); //7:00am
        $hora_fin = Carbon::createFromTime(13, 0, 0); //3:00pm

        while ($hora_inicial <= $hora_fin) {
            $this->horas[$ctr] = $hora_inicial->format('h:i A');
            $hora_inicial->addMinutes(15); //intervalo
            $ctr = $ctr + 1;
        }
    }

    public function show_create($hora, $nombreDia, $year, $mes, $dia, $fecha)
    {
        $this->dispatch('show', data: ['hora_inicio' => $hora, 
                                        'nombreDia' => $nombreDia,
                                        'year' => $year,
                                        'mes' => $mes,
                                        'dia' => $dia,
                                        'fecha'=>$fecha]);
    }

    public function fechas_ocupadas()
    {
        $contador = 2;
        $ocupado = false;
        foreach ($this->dias as $dia) {
            if($this->horas){
                foreach ($this->horas as $hora) {
                    foreach ($this->citas as $cita) {

                        $hora_inicio = $cita->hora_inicio;
                        $hora_fin = $cita->hora_fin;               
                        $hora_curada = Carbon::createFromFormat('h:i A', $hora)->format('H:i:s');

                        if(
                        (($hora_curada >= $hora_inicio && $hora_curada < $hora_fin) || ($hora_curada == $hora_fin)) && ($dia->format('Y-m-d') == $cita->fecha)
                        ){
                            $ocupado = true;
                            $cita_temp = $cita;
                        }
                    }
                    if($ocupado){
                        $this->citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora] = ['ocupada', $cita_temp->pacientee->nombre, $cita_temp->id, $cita_temp->tratamiento,'no'];
                        if($cita_temp->confirmada){
                            $this->citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora] = ['ocupada', $cita_temp->pacientee->nombre, $cita_temp->id, $cita_temp->tratamiento,'confirmada'];
                        }
                    }else{
                        $this->citas_disponibles_ocupadas[$dia->format('Y-m-d')][$hora] = "disponible";
                    }
                    $ocupado = false;
                }

            }
        }
      
    }

    #[On('confirmar_cita_detalle')] 
    public function confirmar_cita($cita_id){
        $cita = Cita::find($cita_id);
        if($cita->confirmada){
            $cita->confirmada = false;
        }else{
            $cita->confirmada = true;
        }
        $cita->save();
        $this->refrescar_citas();
    }
    
    #[On('cancelar_cita_detalle')] 
    public function cancelar_cita($cita_id){
        $this->dispatch('cancelar_cita');
        $this->cita_eliminar = $cita_id;
    }   
    
    #[On('cancelar_cita_bd')] 
    public function cancelar_cita_bd(){
        $cita = Cita::find($this->cita_eliminar);
        $cita->delete();
        $this->actualizar();
        $this->render();
    }

    #[On('refrescar_citas')] 
    public function refrescar_citas(){
        $this->actualizar();
        $this->render();
    }

    public function show_detalle($hora, $nombreDia, $year, $mes, $dia, $fecha, $cita_id)
    {
        $this->dispatch('show_detalle', data: [
                                        'hora_inicio' => $hora, 
                                        'nombreDia' => $nombreDia,
                                        'year' => $year,
                                        'mes' => $mes,
                                        'dia' => $dia,
                                        'fecha'=>$fecha,
                                        'cita_id'=>$cita_id,
                                    ]);
    }
}
