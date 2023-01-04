@extends('app.layouts._partials.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
        <div>
            
                <h4>Detalhes do pedido</h4>
                <p>Id do Pedido: {{ $pedido->id }}</p>
                <p>Id do Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
            
                <h4>Itens do pedido:</h4>
                
                <table border='1' width='100%'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de inclusão do item no pedido:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos_pedidos as $produto)  
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </td>
                            </tr> 
                        @endforeach   
                    </tbody>
                   
                </table>
                 <form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
                @csrf
                    <select name="produto_id">
                        <option>-- Selecione um Produto --</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }} >{{ $produto->descricao }}</option>
                        @endforeach                       
                    </select>
                    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

                    <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class='borda-preta'>
                     {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection 