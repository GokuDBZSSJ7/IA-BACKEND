<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dado extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudante_id',
        'faltas',
        'faltas_consecutivas',
        'nota_media',
        'renda_familiar',
        'bolsa',
        'intervencao',
        'resultado_intervencao',
        'precisao_ia'
    ];

    public function estudante()
    {
        return $this->belongsTo(Estudante::class, 'estudante_id');
    }
}
