
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
         
            <form class="col-md-12 mt-5" method="post" action="{{route('emprestimo.store')}}" >
                @csrf
                <div class="form-group">
                  <label>Nome:</label>
                  <input type='date' name='data_devolucao' id="formid" class='form-control'>
                  <p class="text-danger">{{ $errors->has('data') ? $errors->first('data') : '' }}</p>
                  <?php 
                    if(isset($_GET['erro_data']) == 'erro'){
                        echo("<p class='text-danger'>Utilize uma data maior que o dia de hoje</p>");
                    }{};
                  ?>
                  </div>
                
                <div class="form-group">
                    <label>Livro:</label>
                    
                    <Select class="btn" name="livro_id">
                        <option value="">Selecione uma opção de livro</option>
                        @foreach ($livros as $item) 
                        <?php
                        if($item->situacao == 'disponivel'){
                        echo("<option value='$item->id'>$item->nome</option>");
                        }?>
                        @endforeach
                    </Select>
                    
                    <p class="text-danger">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</p>
             </div>
             <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <?php $today = date("Y-m-d"); ?>
            <input type="hidden" name="data_emprestimo" value="<?= $today ?>">
            <input type="hidden" name="situacao" value="emprestado">
                
                                  
                <button type="submit" class="btn btn-primary mt-2">Enviar</button>
            </form>

        </div>        
    </div>
</body>       
</html>
