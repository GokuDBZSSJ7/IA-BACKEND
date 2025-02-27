<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'escola_id'
    ];

    protected $hidding = [
        'password'
    ];

    protected $with = [
        'escola',
        'cursos'
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'admin_id');
    }

    public function turmas()
    {
        return $this->hasManyThrough(Turma::class, Curso::class, 'admin_id', 'curso_id', 'id', 'id');
    }
}
