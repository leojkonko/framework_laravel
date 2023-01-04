@extends('app.layouts._partials.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('pedido.store') }}">
                @csrf
                    <select name="cliente_id">
                        <option>-- Selecione um Cliente --</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ isset($cliente->id) ? $cliente->id : old('cliente_id') }}"
                             {{ $cliente->id == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>                
                        @endforeach
                    </select>
                    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}    

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection 