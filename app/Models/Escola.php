<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
