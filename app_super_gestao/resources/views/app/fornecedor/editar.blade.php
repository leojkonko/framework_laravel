@extends('app.layouts._partials.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedores') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
        
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('app.fornecedores.editar', $fornecedor->id) }}">
                @csrf
                    <input type="hidden" name="id" value="{{ $fornecedor->id }}">
                    <input type="text" name='nome' placeholder="nome" value="{{ $fornecedor->nome }}" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type="text" name='site' placeholder="site" value="{{ $fornecedor->site }}" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : ''}}
                    <input type="text" name='uf' placeholder="uf" value="{{ $fornecedor->uf }}" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type="text" name='email' placeholder="email" value="{{ $fornecedor->email }}" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit" class="borda-preta">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection