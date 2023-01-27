<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'estado',
        'cidade',
        'cep',
        'bairro',
        'rua',
        'numero',
    ];
}
