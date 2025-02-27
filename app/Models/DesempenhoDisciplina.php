<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesempenhoDisciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudante_id',
        'disciplina_id',
        'bimestre_id',
        'turma_id',
        'nota',
        'frequencia',
        'faltas',
        'faltas_consecutivas'
    ];

    public function estudante()
    {
        return $this->belongsTo(Estudante::class, 'estudante_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }

    public function bimestre()
    {
        return $this->belongsTo(Bimestre::class, 'bimestre_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
