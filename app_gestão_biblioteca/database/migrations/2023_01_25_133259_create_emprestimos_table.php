<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('livro_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('livro_id')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   Schema::table('emprestimos', function(Blueprint $table){
        $table->dropForeign('emprestimos_user_id_foreign');
        $table->dropColumn('user_id');

        $table->dropForeign('emprestimos_livro_id_foreign');
        $table->dropColumn('livro_id');
    });
        Schema::dropIfExists('emprestimos');
    }
}
