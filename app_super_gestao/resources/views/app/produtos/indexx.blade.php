@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Listagem de produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.produtos.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade id</th>
                            <th>Comprimentoo</th>
                            <th>Altura</th>
                            <th>Largura</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome}}</td>
                                <td>{{ $produto->descricao}}</td>
                                <td>{{ $produto->fornecedor->nome}}</td>
                                <td>{{ $produto->fornecedor->site}}</td>
                                <td>{{ $produto->peso}}</td>
                                <td>{{ $produto->unidade_id}}</td>
                                <td>{{ $produto->comprimento ?? '' }}</td>
                                <td>{{ $produto->altura ?? '' }}</td>
                                <td>{{ $produto->largura ?? '' }}</td>
                                
                                <td><a href="{{ route('app.produtos.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form method="post" id="form_{{$produto->id}}" action="{{ route('app.produtos.destroy', ['produto' => $produto->id]) }}">                          
                                        @csrf                                        
                                        <button style="background-color: white;border: 0px;color: black;" type="submit">
                                           Excluir
                                        </button>
                                    </form>
                                </td>
                                <td><a href="{{ route('app.produtos.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan='12'>
                                    Id do pedido
                                        <h4>Pedidos</h4>
                                        @foreach ($produto->pedidos as $pedido)
                                            <a href='{{route('pedido-produto.create', ['pedido' => $pedido->id])}}'>
                                                {{$pedido->id}}
                                            </a>
                                        @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links() }}

            </div>
        </div>
    </div>
@endsection