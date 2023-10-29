<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = "historial_clinicos";

    public $fillable = [
        'Diabetes',
        'Tuberculosis',
        'Presion', 
        'Hepatitis',
        'Anemia',
        'Asma',
        'Neumonia',
        'Migrana',
        'Fuma',
        'Alcohol',
        'Ejercicio',
        'PDF',
        'paciente_id',
    ];

    public $timestamps = false;
    use HasFactory;
}
