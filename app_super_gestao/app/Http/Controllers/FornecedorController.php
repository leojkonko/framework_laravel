<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
       
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'. $request->input('nome') .'%')
        ->where('site', 'like', '%'. $request->input('site') .'%')
        ->where('uf', 'like', '%'. $request->input('uf') .'%')
        ->where('email', 'like', '%'. $request->input('email') .'%')
        ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){
        $msg = '';

        if($request->input('_token') != ''/* && $request->input('id') == ''*/){
            //cadastro
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'o campo :attribute deve ser preenchido',
                'nome.min' => 'o campo nome deve ter no mínimo 3 caracteres',
                'nome.min' => 'o campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'o campo nome deve ter no mínimo  caracteres',
                'uf.max' => 'o campo nome deve ter no máximo  caracteres',
                'email.email' => 'o campo email não foi preenchido corretamente'    
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados para view
            $msg = 'os dados foram incluídos com sucesso!';

        }

        //edição
       /* if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $upadate = $fornecedor = update($request->all());

            if($update){
                echo 'sucesso';
            } else{
                echo 'falha';
            }
        }*/

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id){

        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.editar', ['fornecedor' => $fornecedor]);
        
    }

    public function concluir_edicao(Request $request){

        $fornecedor = Fornecedor::find($request->input('id'));
        //echo ($fornecedor);
        $update = $fornecedor->update($request->all());
        if($update){
            $msg = 'Atualização realizada com sucesso!';
        } else{
            $msg = 'Falha na atualização.';
        }

        return view('app.fornecedor.adicionar', ['id' => $request->input('id'),'msg' => $msg]);
    }

    public function excluir(Request $request){

            $fornecedor = Fornecedor::find($id)->delete();

            return redirect()->route('app.fornecedor');

         }
}
