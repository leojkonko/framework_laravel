
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('_partials.topo')
    <div class="container">
        <div class="row">

            <form class="col-md-12 mt-5" method="post" action="{{route('livro.update',['livro'=>$livro])}}" >
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label>Nome:</label>
                  <input type="text" name='nome' class="form-control" value="{{ isset($livro->nome) ? $livro->nome : old('nome') }}"  placeholder="Seu nome">
                  <p class="text-danger">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</p>
                  </div>
                <div class="form-group">
                  <label>Autor:</label>
                  <input type="text" name="autor" class="form-control" value="{{ isset($livro->autor) ? $livro->autor : old('autor') }}"  placeholder="Senha">
                  <p class="text-danger">{{ $errors->has('autor') ? $errors->first('autor') : '' }}</p>
                </div>
                <div class="form-group">
                    <label>Gênero:</label>
                    <Select class="btn" name="genero">
                        <option value="romance" {{$livro->genero == 'romance' ? 'selected' : ''}}>Romance</option>
                        <option value="ficcao" {{$livro->genero == 'ficcao' ? 'selected' : ''}}>Ficção</option>
                        <option value="fantasia" {{$livro->genero == 'fantasia' ? 'selected' : ''}}>Fantasia</option>
                        <option value="aventura" {{$livro->genero == 'aventura' ? 'selected' : ''}}>Aventura</option>
                    </Select>
                    <p class="text-danger">{{ $errors->has('genero') ? $errors->first('genero') : '' }}</p>
                  </div>
                  <div class="form-group">
                    <label>Status:</label>
                    <Select class="btn" name="situacao">
                      
                        <option value="disponivel" {{$livro->situacao == 'disponivel' ? 'selected' : 'disabled'}}>Disponível</option>
                        <option value="emprestado" {{$livro->situacao == 'emprestado' ? 'selected' : 'disabled'}}>Emprestado</option>
                    </Select>
                    <p class="text-danger">{{ $errors->has('situacao') ? $errors->first('situacao') : '' }}</p>
                  </div>
               
                <button type="submit" class="btn btn-primary mt-2">Enviar</button>
              </form>
        </div>        
    </div>
</body>
</html>
