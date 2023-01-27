
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
            <div class="col-md-12 mt-4 d-flex justify-content-end">
                <a href="{{route('livro.create')}}">Adicionar Livro</a>
             </div>
            @foreach ($livro as $user)
                
            
            <div class="col-md-4 mt-5">
                <div class="card ">
                    <h5 class="card-header">{{$user->nome}}</h5>
                    <div class="card-body">
                      <h5 class="card-title">Autor: {{$user->autor}}</h5>
                      <p class="card-text">Gênero: {{$user->genero}}</p>
                      <p class="card-text">Situação: {{$user->situacao}}</p>
                      <p class="card-text">Id: {{$user->id}}</p>
                      <a href="{{route('livro.edit', ['livro' => $user->id])}}" class="btn btn-primary">Editar</a>
                      <a href="#"
                        onclick="document.getElementById('form{{$user->id}}').submit();" class="btn btn-primary">Excluir</a>


                   <form id="form{{$user->id}}" type="hidden" action="{{ route('livro.destroy', ['livro'=>$user->id]) }}" method="POST" class="d-none">
                       @csrf
                       @method('DELETE')
                   </form>              

                    </div>
                  </div>
            </div>
            @endforeach

        </div>        
    </div>
</body>
</html>
