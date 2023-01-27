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


    /**
     * Relacionamento com a tabela ordemServiços
     *
     * @return void
     */
    public function servicos()
    {
        return $this->hasMany(OrdemServicos::class);
    }
}
