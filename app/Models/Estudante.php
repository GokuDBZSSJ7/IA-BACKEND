<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'curso_id',
        'bimestre_id',
        'escola_id',
        'renda_familiar',
        'bolsa',
        'distancia'
    ];

    protected $with = ['curso', 'bimestre', 'escola'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function bimestre()
    {
        return $this->belongsTo(Bimestre::class, 'bimestre_id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
}
