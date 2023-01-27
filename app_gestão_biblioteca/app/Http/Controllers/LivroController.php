<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livro = Livro::all();
        return view('livro.index', ['livro' => $livro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLivroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLivroRequest $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'autor' => 'required|min:3|max:2000',
            'genero' => 'required',
            //'situacao' => 'exists:unidades,id',
            'situacao' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no  mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no  máximo 40 caracteres',
            'autor.min' => 'O campo autor deve ter no  mínimo 3 caracteres',
            'autor.max' => 'O campo autor deve ter no  máximo 2000 caracteres'
        ];
        $request->validate($regras,$feedback);
        //dd($request->all());
        Livro::create($request->all());
        return redirect()->route('livro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        return view('livro.show', ['livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        //$livro->getAttributes();
        $livros = Livro::find($livro);
        //dd($livro);
        return view('livro.edit', ['livro' => $livro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLivroRequest  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'autor' => 'required|min:3|max:2000',
            'genero' => 'required'
            //'situacao' => 'exists:unidades,id',
            
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no  mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no  máximo 40 caracteres',
            'autor.min' => 'O campo autor deve ter no  mínimo 3 caracteres',
            'autor.max' => 'O campo autor deve ter no  máximo 2000 caracteres'
        ];
        $request->validate($regras,$feedback);
        //dd($request->all());
        $livro->update($request->all());
        return redirect()->route('livro.show', ['livro' => $livro->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        
        //Livro::find($livro->id)->delete();
        //dd($livro);
        $livro->delete();
       //$livro = Livro::all();
       return redirect()->route('livro.index');
    }
}
