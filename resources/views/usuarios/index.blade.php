@extends('layouts.header')
@section('contentUsuarios') {{-- Preenche o slot 'content' do layout --}}
<?php
use App\Models\Usuario;
$usuarios = Usuario::all();
?>
<div class="container mt-5 border-top border-bottom border-dark pt-4">
    <div class="jumbotron bg-light p-4 rounded-3 shadow-sm">
        <h2>Usuários Cadastrados</h2>
        <p class="lead">Estes são os usuários cadastrados no sistema.</p>
        <hr class="my-4">
    </div>
    <div class="row mt-4">
        @foreach ($usuarios as $usuario)
        <div class="col-md-4">
            <div class="card mb-4 shadow-lg border-primary">
                <div class="card-body">
                    <h2>{{ $usuario->nome }}</h2>
                    <p>Email: {{ $usuario->email }}</p>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('views.editar', ['id' => $usuario->id]) }}">Editar</a>
                    <a class="btn btn-sm btn-outline-danger" href="{{ route('api.excluir_usuario', ['id' => $usuario->id]) }}">Excluir</a>
                    <a class="btn btn-sm btn-outline-secondary" href="#">Visualizar</a>
                </div>
            </div>
        </div>
        @endforeach
</div>
