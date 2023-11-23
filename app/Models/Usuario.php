<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'usuario',
        'clave',
        'nombre',
        'apellido_1',
        'apellido_2',
        'Puesto',
        'Tipo',
    ];

    public function getAuthIdentifierName()
    {
        return 'usuario'; // Cambia esto si el nombre de usuario es diferente en tu base de datos
    }

    public function getNombreCompleto(){
        return $this->nombre . " ". $this->apellido_1 . " " . $this->apellido_2;
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
