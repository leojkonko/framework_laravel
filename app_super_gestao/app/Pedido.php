<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['cliente_id'];

    public function produtos_pedidos(){
        return $this->belongsToMany('App\Produtos', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id','created_at','updated_at');
    }
}
