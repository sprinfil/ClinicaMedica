<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleTratamiento extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function servicio()
    {
        return $this->hasOne(Servicio::class,'id','servicio_id');
    }
}
