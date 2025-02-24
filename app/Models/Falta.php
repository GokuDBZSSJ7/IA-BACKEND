<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    use HasFactory;

    protected $fillable = [
        'bimestre_id',
        'estudante_id',
        'data',
        'presente',
        'faltas_consecutivas'
    ];

    public function bimestre()
    {
        return $this->belongsTo(Bimestre::class, 'bimestre_id');
    }

    public function estudante()
    {
        return $this->belongsTo(Estudante::class, 'estudante_id');
    }
}
