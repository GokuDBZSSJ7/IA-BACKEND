<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'admin_id',
        'escola_id'
    ];

    // protected $with = [
    //     'admin'
    // ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}

