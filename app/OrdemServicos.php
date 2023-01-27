<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServicos extends Model
{
    protected $fillable = [
        'cliente_id', 
        'servico_id',
        'abertura', 
        'observacao',
    ];

    /**
     * Relacionamento com a tabela clientes
     *
     * @return void
     */
    public function relCliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    /**
     * Relacionamento com a tabela Serviços
     *
     * @return void
     */
    public function relServicos()
    {
        return $this->belongsTo(Servicos::class);
    }
}
