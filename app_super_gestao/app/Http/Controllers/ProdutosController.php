<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Unidade;
use App\Fornecedor;
use App\ProdutoDetalhes;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produtos::with(['fornecedor'])->paginate(10);

        foreach($produtos as $key => $produto ){
            
           // print_r($produto->getAttributes());
           $produtoDetalhes = ProdutoDetalhes::where('produto_id', $produto->id)->first();

           if (isset($produtoDetalhes)){
            $produtos[$key]['comprimento'] = $produtoDetalhes->comprimento;
            $produtos[$key]['largura'] = $produtoDetalhes->largura;
            $produtos[$key]['altura'] = $produtoDetalhes->altura;
           }
        }

     return view('app.produtos.indexx', ['produtos' => $produtos, 'request' => $request->all()]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();

        $fornecedores = Fornecedor::all();

        return view('app.produtos.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

       /* $produto = new Produtos();
        $nome = $request->get('nome');
        $descricao = $request->get('descricao');
        $peso = $request->get('peso');
        $unidade_id = $request->get('unidade_id');

        $produto->nome = $nome;
        $produto->descricao = $descricao;
        $produto->peso = $peso;
        $produto->unidade_id = $unidade_id;
        
        $produto->save();*/

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no  mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no  máximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no  mínimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no  máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um valor inteiro',
            'unidade.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];
        $request->validate($regras,$feedback);
        Produtos::create($request->all());

        return redirect()->route('app.produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produto)
    {
        //dd($produto);
        return view('app.produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produto)
    {

        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produtos.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produtos $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no  mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no  máximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no  mínimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no  máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um valor inteiro',
            'unidade.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];
        $request->validate($regras,$feedback);

        $produto->update($request->all());
        return redirect()->route('app.produtos.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produto)
    {
       $produto->delete();
       return redirect()->route('app.produtos');
    }
}
