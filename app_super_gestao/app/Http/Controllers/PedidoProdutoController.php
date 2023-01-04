<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produtos;
use App\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {   
        $produtos = Produtos::all();
        $pedido->produtos_pedidos;
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [ 
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe' ,
            'quantidade.required' => 'A quantidade é requerida'
        ];
                
        $request->validate($regras, $feedback);
        /*
        $pedido_produto = new PedidoProduto();
        $pedido_produto->pedido_id = $pedido->id;
        $pedido_produto->produto_id = $request->get('produto_id');
        $pedido_produto->quantidade = $request->get('quantidade');
        $pedido_produto->save();
        */
        $pedido->produtos_pedidos()->attach(
            $request->get('produto_id'), 
            ['quantidade' => $request->get('quantidade')]
        );
        return redirect()->route('pedido-produto.create',['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
       // print_r($pedido->getAttributes());

       /* PedidoProduto::where([
          'pedido_id' => $pedido->id,
          'produto_id' => $produto->id  
        ])->delete();
        */

        $pedidoProduto->delete();
        //echo ($pedido_id);
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
