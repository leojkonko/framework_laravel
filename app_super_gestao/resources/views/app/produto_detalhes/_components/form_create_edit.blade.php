@extends('app.layouts._partials.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    

    <div class="informacao-pagina">

        <div style="width: 30%; margin-left:auto; margin-right:auto;">
            <form method="post" action="{{ route('produto-detalhe.store') }}">
            
                <input class="borda-preta">
                @csrf

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
                        <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>
                    @endforeach                         
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection