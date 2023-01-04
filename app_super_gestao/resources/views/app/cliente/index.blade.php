@extends('app.layouts._partials.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
<h2>teste</h2>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome}}</td>
                                                                
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td>
                                    <form method="post" id="form_{{$cliente->id}}" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">                          
                                        @csrf                                        
                                        <button style="background-color: white;border: 0px;color: black;" type="submit">
                                           Excluir
                                        </button>
                                    </form>
                                </td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clientes->appends($request)->links() }}

            </div>
        </div>
    </div>
@endsection