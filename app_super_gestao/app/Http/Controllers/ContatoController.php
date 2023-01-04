<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;


class ContatoController extends Controller{
    public function contato(Request $request){
         $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }   

    public function salvar(Request $request){
        $feedback = [
            'nome.min' => 'O campo precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome já está em uso',
            'email.email' => 'O campo email ser preenchido',
            'mensagem.max' => 'O limite de caracteres é de 2000 caracteres',

            'required' => 'o campo :attribute deve ser preenchido'
        ];
        $regras = [ 
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'       
        ];
        
        $request->validate($regras, $feedback);

        /*$contato = new SiteContato();
        $contato->create($request->all());
        return view('site.contato', ['titulo' => 'Contato (teste)']);
        */
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
