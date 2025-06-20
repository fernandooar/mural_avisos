@extends('layouts.header')
@section('content')
<?php
use App\Models\Usuario;
$usuarios = Usuario::all();
?>
 <div class="container mt-4 alert alert-info" role="alert">
    <h1>Editar Usuário</h1>
    <form action="{{ route('api.editar_usuario', ['id' => $dados['id']]) }}" method="POST">
        @csrf       
        <div class="mb-3 form-group">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" id="nome" name="nome" value="{{ $dados['nome'] }}">
        </div>
        <div class="mb-3 form-group">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ $dados['email'] }}">
        </div>
        <div class="mb-3 form-group">
            <label class="form-label" for="senha">Senha:</label>
            <input class="form-control" type="password" id="senha" name="senha">
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
</div>
@endsection