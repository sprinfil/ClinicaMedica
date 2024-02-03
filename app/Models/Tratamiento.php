<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['usuario_id'];

    public function atendio()
    {
        return $this->hasOne(Usuario::class,'id','usuario_id');
    }
    public function paciente()
    {
        return $this->hasOne(Paciente::class,'id','paciente_id');
    }

    static public function total_efectivo_con_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'EFECTIVO')
        ->sum('monto');
    
    $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'EFECTIVO')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_tarjeta_debito_con_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA DEBITO')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA DEBITO')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_tarjeta_credito_con_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA CREDITO')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA CREDITO')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_dolares_con_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'DOLAR')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'DOLAR')
        ->sum('impuesto');

        $totalImpuesto = $totalImpuesto / Configuracion::first()->dolar ;
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_cheques_con_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'CHEQUE')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'CHEQUE')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_efectivo_sin_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'EFECTIVO')
        ->sum('monto');
    
        return $totalMonto;
    }

    static public function total_tarjeta_debito_sin_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA DEBITO')
        ->sum('monto');

        return $totalMonto;
    }

    static public function total_tarjeta_credito_sin_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA CREDITO')
        ->sum('monto');
    
        return $totalMonto;
    }

    static public function total_dolares_sin_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'DOLAR')
        ->sum('monto');
    
        return $totalMonto;
    }

    static public function efectivo_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','EFECTIVO')->get()
        ->sum('impuesto');
        return $totalMonto;
    }

    static public function dolares_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','DOLAR')->get()
        ->sum('impuesto');
        $totalMonto = $totalMonto / Configuracion::first()->dolar;
        return $totalMonto;
    }

    static public function  tarjeta_credito_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','TARJETA CREDITO')->get()
        ->sum('impuesto');
        return $totalMonto;
    }

    static public function  tarjeta_debito_impuestos($fecha){
        $totalMonto = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','TARJETA DEBITO')->get()
        ->sum('impuesto');
        return $totalMonto;
    }
}
