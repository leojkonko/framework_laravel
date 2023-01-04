@extends('app.layouts._partials.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <br><br><br><br>Clientes

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedores') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('app.fornecedores.listar') }}">
                    @csrf
                    <input type="text" name='nome' placeholder="nome" class="borda-preta">
                    <input type="text" name='site' placeholder="site" class="borda-preta">
                    <input type="text" name='uf' placeholder="uf" class="borda-preta">
                    <input type="text" name='email' placeholder="email" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection