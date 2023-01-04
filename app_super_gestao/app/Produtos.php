<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProdutoDetalhes;

class Produtos extends Model
{
   // protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

   /* public function produtoDetalhe(){
        return Produtos::hasOne('App\ProdutoDetalhes');
    }*/

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }


}
