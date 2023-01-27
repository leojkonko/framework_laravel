
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
            <div class="col-md-12 mt-4 d-flex justify-content-end"><a href="{{redirect('https://localhost:8000/register')}}">Adicionar Usuário</a></div>
            @foreach ($usuario as $user)
                
            
            <div class="col-md-4 mt-5">
                <div class="card ">
                    <h5 class="card-header">Nome: {{$user->name}}</h5>
                    <div class="card-body">
                      <h5 class="card-title">Id: {{$user->id}}</h5>
                      <p class="card-text">Email: {{$user->email}}</p>
                      <a href="#" class="btn btn-primary">Editar</a>
                      <a href="#" class="btn btn-primary">Excluir</a>
                    </div>
                  </div>
            </div>
            @endforeach

        </div>        
    </div>
</body>
</html>
