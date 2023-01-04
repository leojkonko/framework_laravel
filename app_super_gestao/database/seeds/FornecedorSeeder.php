<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'fornecedor 100';
       // $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save(); 

        Fornecedor::create([
            'nome'=>'fornecedor 200',
           // 'site' => 'fornecedor200.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        DB::table('fornecedores')->insert([
            'nome'=>'fornecedor 300',
           // 'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br' 
        ]);

    }
}
