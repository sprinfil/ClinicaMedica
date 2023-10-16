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
}
