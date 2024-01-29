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
        'gastricos',
        'renales',
        'artritis',
        'epilepsia',
        'cancer',
        'atencion_medica',
        'porque_atencion_medica',
        'toma_medicamento',
        'es_alergico_medicamento',
        'cual_medicamento_alergico',
        'es_alergico_alimento',
        'cual_alimento_alergico',
        'PDF',
        'paciente_id',
    ];

    public $timestamps = false;
    use HasFactory;
}
