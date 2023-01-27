@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar tarefa</div>

                <div class="card-body">
                   <form action="{{ route('tarefa.store') }}" method="post">
                   @csrf
                        <div class="mb-3">
                            <label class="form-label">Tarefa</label>
                            <input type="text" class="form-control" name="tarefa" value="{{ old('tarefa') ? old('tarefa') : ''}}">
                             <p class="text-danger">{{ $errors->has('tarefa') ? $errors->first('tarefa') : ''}}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data Limite Conclusão</label>
                            <input type="date" class="form-control" name="data_limite_conclusao" value="{{ old('data_limite_conclusao') ? old('data_limite_conclusao') : ''}}">
                             <p class="text-danger">{{ $errors->has('data_limite_conclusao') ? $errors->first('data_limite_conclusao') : ''}}</p>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
