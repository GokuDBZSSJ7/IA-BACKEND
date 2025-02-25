<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'bimestre_id',
        'estudante_id',
        'mensagem',
        'detalhes',
        'nivel',
        'grave'
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
