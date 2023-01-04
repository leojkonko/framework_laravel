<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhes extends Model
{
   // protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function produto(){
        return $this->belongsTo('App\Produtos', 'produto_id', 'id');
    }
}
