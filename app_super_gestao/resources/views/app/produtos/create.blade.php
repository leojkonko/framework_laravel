@extends('app.layouts._partials.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.produtos') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('app.produtos.store') }}">
                @csrf
                    <input type="text" name='nome' placeholder="Nome" value="{{ old('nome') }}" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name='descricao' placeholder="Descrição" value="{{ old('descricao') }}" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}    

                    <input type="text" name='peso' placeholder="Peso" value="{{ old('peso') }}" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

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