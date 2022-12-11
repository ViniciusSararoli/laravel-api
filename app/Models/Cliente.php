<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'documento',
        'tipo',
        'email', 
        'telefone',
        'dia',
        'senha',
        'key',
        'client',
    ];
}
