<?php

namespace App\Http\Controllers;

use App\Models\livro;
use App\Models\User;
use App\Models\Emprestimos;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //return 'kla';
        return redirect()->route('emprestimo.index');
    }

     public function index()
    {
        $emprestimo = Emprestimos::all();
        $livro = Livro::all();
        $usuario = User::all();
        return view('emprestimo.index', ['emprestimo' => $emprestimo, 'livro'=> $livro, 'usuario'=>$usuario]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $livros = Livro::all();
        
        return view('emprestimo.create', ['livros' => $livros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $request->all();
        //dd($r);
        $today = date("Y-m-d"); 
            
        if($r['data_devolucao'] >= $today){

    $regras = [
        'livro_id' => 'required',
        //'situacao' => 'exists:unidades,id',
        'data_devolucao' => 'required|date'
    ];

    $feedback = [
        'required' => 'O campo :attribute deve ser preenchido',
        'data_devolucao.date' => 'O campo autor deve ter no  máximo 2000 caracteres'
    ];
    $request->validate($regras, $feedback);

        //dd($request->all());
        Emprestimos::create($request->all());
        $l = $r['livro_id'];
       $teste = Livro::find($l);
       $teste->update($request->all());
       //dd($teste);
        return redirect()->route('emprestimo.index');
    }else{
        
	    //dd($request->all());
        return redirect()->route('emprestimo.create', ['erro_data' => 'erro']);	   

    }

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
        $emprestimo = Emprestimos::find($id);
        $livro_id = $emprestimo->getOriginal('livro_id');
        $livro = Livro::find($livro_id);
        $livros = Livro::all();
        return view('emprestimo.edit', ['emprestimo'=> $emprestimo, 'livro' => $livro, 'livros'=>$livros]);
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
        $r = $request->all();
        $today = date("Y-m-d"); 
            
        if($r['data_devolucao'] >= $today){

    $regras = [
        'livro_id' => 'required',
        //'situacao' => 'exists:unidades,id',
        'data_devolucao' => 'required|date'
    ];

    $feedback = [
        'required' => 'O campo :attribute deve ser preenchido',
        'data_devolucao.date' => 'O campo autor deve ter no  máximo 2000 caracteres'
    ];
    $request->validate($regras, $feedback);

        $r = $request->all();
       $emprestimo = Emprestimos::find($id);

        $livro_id = $emprestimo->livro_id;
        $livro = Livro::find($livro_id);
        $livro->situacao = 'disponivel';
        $livro->save();
        
        $emprestimo->update($request->all());

        $livro2 = Livro::find($r['livro_id']);
        $livro2->situacao = 'emprestado';
        $livro2->save();
        
         return redirect()->route('emprestimo.index');
    }else{
        
        return redirect()->route('emprestimo.edit', ['emprestimo'=> $id,'erro_data' => 'erro']);	   

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprestimo = Emprestimos::find($id);
        $livro = Livro::find($emprestimo->getAttributes()['livro_id']);
        $livro->situacao = 'disponivel';
        $livro->save();
        $emprestimo->delete();
        
        return redirect()->route('emprestimo.index');
    }
}
