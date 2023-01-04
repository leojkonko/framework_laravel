<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando coluna em produtos q vai receber fk de fornecedores
        
        Schema::table('produtos', function(Blueprint $table){
           $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor migration',
                'site' => 'fornecedormigration.com.br',
                'email' => 'contato@fornecedormigration.com.br',
                'uf' => 'SP'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){

            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropcolumn('fornecedor_id');
        });
    }
}
