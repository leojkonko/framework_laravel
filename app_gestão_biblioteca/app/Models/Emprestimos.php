<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimos extends Model
{
    use HasFactory;
    //protected $table = ['emprestimos'];
    protected $fillable = ['data_emprestimo','data_devolucao','user_id','livro_id'];
}
