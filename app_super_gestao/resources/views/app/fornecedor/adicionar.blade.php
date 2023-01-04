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
        {{ $msg }}
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('app.fornecedores.adicionar') }}">
                @csrf
                    <input type="hidden" name="id" value="">
                    <input type="text" name='nome' placeholder="nome" value="{{ old('nome') }}" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type="text" name='site' placeholder="site" value="{{ old('site') }}" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : ''}}
                    <input type="text" name='uf' placeholder="uf" value="{{ old('uf') }}" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type="text" name='email' placeholder="email" value="{{ old('email') }}" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection