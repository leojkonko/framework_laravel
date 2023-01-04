
{{ $slot }}
<form method="post" action={{ route('site.contato') }}>
@csrf 
    <input name="nome" type="text"  placeholder="Nome" value="{{ old('nome') }}" class="borda-preta">
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" type="text" placeholder="Telefone" value="{{ old('telefone') }}" class="borda-preta">
    @if ($errors->has('telefone'))
        {{ $errors->first('telefone') }}
    @endif
    <br>
    <input name="email" type="text" placeholder="E-mail" value="{{ old('email') }}" class="borda-preta">
    @if ($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
    <br>

    <select name="motivo_contatos_id" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $indice)
            <option value="{{ $indice['id'] }}" {{ old('motivo_contatos_id') == $indice['id'] ? 'selected' : '' }}>
             {{ $indice['motivo_contato'] }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
        {{ $errors->first('motivo_contatos_id') }}
    @endif
    <br>
    <textarea name="mensagem" class="borda-preta">
        @if (old('mensagem') != '')
                {{ old('mensagem') }}
        @else
            Preencha aqui sua mensagem
        @endif
    </textarea>
    @if ($errors->has('mensagem'))
        {{ $errors->first('mensagem') }}
    @endif
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
@if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    @foreach ($errors->all() as $key)
        {{ $key }}
    @endforeach
    <div>
@endif