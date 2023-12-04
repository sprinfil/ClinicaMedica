<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'paciente',
        'atiende',
        'tratamiento',
        'hora_inicio',
        'hora_fin',
        'agendo',
    ];

    public function pacientee()
    {
        return $this->hasOne(Paciente::class,'id','paciente');
    }

    public function atiendee()
    {
        return $this->hasOne(Usuario::class,'id','atiende');
    }
}
