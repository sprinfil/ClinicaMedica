<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function atendio()
    {
        return $this->hasOne(Usuario::class,'id','usuario_id');
    }
}
