<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = ['nome','uf','email', 'site'];

    public function produtos(){
        return $this->hasMany('App\Produtos', 'fornecedor_id', 'id');
    }
}
