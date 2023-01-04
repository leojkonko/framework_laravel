@extends('app.layouts._partials.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Cliente</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{ route('cliente.store') }}">
                @csrf
                    <input type="text" name='nome' placeholder="Nome" value="{{ old('nome') }}" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection 