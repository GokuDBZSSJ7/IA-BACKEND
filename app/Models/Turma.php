<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'ano',
        'curso_id',
    ];

    protected $with = [
        'curso'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
