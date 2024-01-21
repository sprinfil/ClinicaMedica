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
        return $efectivo = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','Efectivo')
        ->sum('monto');
    }

    static public function total_tarjeta($fecha){
        return $efectivo = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','tarjeta')
        ->sum('monto');
    }

    static public function total_dolares($fecha){
        return $efectivo = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','dolar')
        ->sum('monto');
    }

    static public function total_cheques($fecha){
        return $efectivo = Tratamiento::whereDate('fecha',$fecha)
        ->where('metodo_pago','cheque')
        ->sum('monto');
    }
}
