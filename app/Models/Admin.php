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

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
}
