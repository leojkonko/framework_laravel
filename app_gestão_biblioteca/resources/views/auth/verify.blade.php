    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Precisamos que você valide o seu email.</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            O link foi envaido novamente ao seu email
                        </div>
                    @endif

                    Antes de usar os recursos da aplicação, valide o seu email.<br>
                    Caso não tenha recebido o email, clique no link a seguir:
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clique aqui </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
