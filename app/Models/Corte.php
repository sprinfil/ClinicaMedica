<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function usuario()
    {
        return $this->hasOne(Usuario::class,'id','usuario_id');
    }
}
