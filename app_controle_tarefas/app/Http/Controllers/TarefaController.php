<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
//use Barryvdh\DomPDF\Facade;
use PDF;

class TarefaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $tarefas = Tarefa::where('user_id', $user_id)->paginate(5);
      
        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'tarefa' => 'required|max:2000|min:5',
            'data_limite_conclusao' => 'required'

        ];
        
        $feedback = [
            'tarefa.required' => 'A tarefa é requerida',
            'tarefa.max' => 'Por favor, menos de 2000 caracteres',
            'tarefa.min' => 'Por favor, escreva mais de 5 caracteres',
            'data_limite_conclusao.required' => 'A data é requerida'
        ];
        $request->validate($regras, $feedback);

        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);

        $destinatario = auth()->user()->email;
    Mail::to($destinatario)->send(New NovaTarefaMail($tarefa));
        
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if($tarefa->user_id == $user_id){
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        } else {
            return view('acesso-negado');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        
        $regras = [
            'tarefa' => 'required|max:2000|min:5',
            'data_limite_conclusao' => 'required'

        ];
        
        $feedback = [
            'tarefa.required' => 'A tarefa é requerida',
            'tarefa.max' => 'Por favor, menos de 2000 caracteres',
            'tarefa.min' => 'Por favor, escreva mais de 5 caracteres',
            'data_limite_conclusao.required' => 'A data é requerida'
        ];
        $request->validate($regras, $feedback);


        $user_id = auth()->user()->id;
        if($tarefa->user_id == $user_id){
            $tarefa->update($request->all());
            return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
        } else {
            return view('acesso-negado');
        }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if($tarefa->user_id == $user_id){
            $tarefa->delete();
            return redirect()->route('tarefa.index');
        } else {
            return view('acesso-negado');
        }

    }

    public function exportacao($extensao){

        if($extensao == 'xlsx'){
            return Excel::download(new TarefasExport, 'lista_tarefas.xlsx');
        }else if($extensao == 'csv'){
            return Excel::download(new TarefasExport, 'lista_tarefas.csv');
        } else if($extensao == 'pdf'){
            return Excel::download(new TarefasExport, 'lista_tarefas.pdf');
        }else{
            return 'erro na extensão';
        }
       
    }

    public function exportar(){
        $tarefas = auth()->user()->tarefas()->get();
        $pdf = PDF::loadView('tarefa.pdf', ['tarefas' => $tarefas]);
        $pdf->setPaper('a4', 'portrait');
        //return $pdf->download('lista_tarefas.pdf');
        return $pdf->stream('lista_tarefas.pdf');
    }
}
