@extends('layouts.header')
@section('content')

    <div class="container mt-4">
        <div class="alert alert-info" role="alert">
            <strong>Instruções:</strong> Preencha o formulário abaixo para cadastrar um novo usuário.
            <h1>Cadastrar Usuário</h1>
            <div class="mb-4">
                <form class="form-control" action="{{ route('api.cadastrar_usuario') }}" method="POST">
                    @csrf
                    <div class="mb-3 form-group">
                        <label class="form-label" for="nome">Nome:</label>
                        <input class="form-control" type="text" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="password">Senha:</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                        <a class="btn btn-secondary" href="{{ route('views.index') }}">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="alert alert-secondary" role="alert">
            <strong>Observação:</strong> Após o cadastro, você poderá visualizar a lista de usuários cadastrados.
        </div>
    </div>
@endsection