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

    static public function total_efectivo($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'EFECTIVO')
        ->sum('monto');
    
    $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'EFECTIVO')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_tarjeta_debito($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA DEBITO')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA DEBITO')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_tarjeta_credito($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA CREDITO')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'TARJETA CREDITO')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_dolares($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'DOLAR')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'DOLAR')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }

    static public function total_cheques($fecha){
        $totalMonto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'CHEQUE')
        ->sum('monto');
    
        $totalImpuesto = Tratamiento::whereDate('fecha', $fecha)
        ->where('metodo_pago', 'CHEQUE')
        ->sum('impuesto');
    
        return $totalMonto + $totalImpuesto;
    }
}
