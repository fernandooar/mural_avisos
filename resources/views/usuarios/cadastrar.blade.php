@extends('layouts.app')
@section('content')

    <h1>Cadastro de Usuário</h1>

    <form action="{{ route('api.cadastrar_usuario')}}" method="POST">
        @csrf 
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
@endsection