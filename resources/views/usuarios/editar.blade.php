@extends('layouts.app')
@section('content')
<?php
use App\Models\Usuario;
$usuarios = Usuario::all();
?>
    <h1>Editar Usuário</h1>
    <form action="{{ route('api.editar_usuario', ['id' => $dados['id']]) }}" method="POST">
        @csrf       
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $dados['nome'] }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $dados['email'] }}">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">
        </div>
        <button type="submit">Salvar</button>
    </form>

@endsection