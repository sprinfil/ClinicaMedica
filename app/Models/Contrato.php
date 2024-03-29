<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'pdf',
        'fecha',
        'paciente_id',
    ];
}
