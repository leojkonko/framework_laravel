<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(51) 998576618';
        $contato->motivo_contato = 1;
        $contato->email = 'contato@sg.com.br';
        $contato->mensagem = 'Olá, seja bem vindo ao sistema';
        $contato->save();   */

        factory(SiteContato::class, 100)->create();
    }
}
