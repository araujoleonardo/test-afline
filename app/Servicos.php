<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $fillable = [
        'nome',
        'detalhes',
        'status',
    ];


    /**
     * Relacionamento com a tabela ordemServiços
     *
     * @return void
     */
    public function clientes()
    {
        return $this->hasMany(OrdemServicos::class);
    }
}
