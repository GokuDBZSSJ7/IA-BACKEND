<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'escola_id'
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
}
