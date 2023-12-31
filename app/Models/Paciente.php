<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_1',
        'apellido_2',
        'correo',
        'numero',
        'fecha_nac',
        'Genero',
        'contacto_nombre',
        'contacto_numero',
        'contacto_correo',
        'contacto_parentesco',
    ];

    public function getAuthIdentifierName()
    {
        return 'paciente'; // Cambia esto si el nombre del paciente es diferente en tu base de datos
    }

    public function getEdad($id){
        $paciente = Paciente::find($id);
        $edad = now()->format('Y') - Carbon::parse($paciente->fecha_nac)->format('Y') ;

        if (Carbon::parse($paciente->fecha_nac)->format('m') - now()->format('m')) {
            $edad--;
        }

        return $edad;
    }

    public function getFullNombre($id){

        $paciente = Paciente::find($id);

        return $paciente->nombre . ' ' . $paciente->apellido_1 . ' ' . $paciente->apellido_2;
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->clave;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
