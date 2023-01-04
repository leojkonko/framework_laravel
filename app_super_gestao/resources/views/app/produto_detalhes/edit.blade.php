@extends('app.layouts._partials.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Editar Detalhes do Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <h4>Produto</h4>
            <div> Nome: {{ $produto_detalhe->produto->nome }}</div>
            <br>
            <div> Descrição: {{ $produto_detalhe->produto->descricao }}</div> 
            <br>

        <div style="width: 30%; margin-left:auto; margin-right:auto;">
            <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
                @csrf
                @method('PUT')

                    <input type="text" name='produto_id' placeholder="Id do produto" 
                value="{{isset($produto_detalhe->produto_id) ? $produto_detalhe->produto_id : old('produto_id') }}" class="borda-preta">
                {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

                 <input type="text" name='comprimento' placeholder="comprimento" 
                value="{{isset($produto_detalhe->comprimento) ? $produto_detalhe->comprimento : old('comprimento') }}" class="borda-preta">
                {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}   
 
                <input type="text" name='largura' placeholder="largura" 
                value="{{isset($produto_detalhe->largura) ? $produto_detalhe->largura : old('largura') }}" class="borda-preta">
                {{ $errors->has('largura') ? $errors->first('largura') : '' }}

                <input type="text" name='altura' placeholder="altura" 
                value="{{isset($produto_detalhe->altura) ? $produto_detalhe->altura : old('altura') }}" class="borda-preta">
                {{ $errors->has('altura') ? $errors->first('altura') : '' }}
              
                <select name="unidade_id">
                    <option>-- Selecione a unidade de medida --</option>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ $produto_detalhe->id == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
                    @endforeach                         
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection