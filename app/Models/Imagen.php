<?php

namespace App\Models;

use App\Models\Tratamiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imagen extends Model
{
    protected $table = "imagenes";
    public $timestamps = false;
    protected $fillable = ['url'];
    use HasFactory;

    public function getTratamiento($tratamiento_id){
        $tratamiento = Tratamiento::find($tratamiento_id);
        return $tratamiento;
    }
}
