@extends('app.layouts._partials.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Visualizar    Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.produtos') }}">Voltar</a></li>
                <li><a href="{{ route('app.produtos') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left:auto; margin-right:auto;text-align:left">
                <table border="1">
                    <tr>
                        <td>Id:</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                     <tr>
                        <td>Nome:</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                     <tr>
                        <td>Descrição:</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                     <tr>
                        <td>Peso:</td>
                        <td>{{ $produto->peso }} kg</td>
                    </tr>
                     <tr>
                        <td>Unidade de medida:</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection