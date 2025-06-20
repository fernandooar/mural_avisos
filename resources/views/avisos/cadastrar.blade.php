@extends('layouts.header')

@section('content')
    <div class="container mt-4">
        <div class="alert alert-info" role="alert">
            <strong>Instruções:</strong> Preencha o formulário abaixo para cadastrar um novo aviso.
            <h1>Cadastrar Aviso</h1>
            <div class="mb-4">
                <form class="form-control " action="{{Route('api.cadastro_avisos')}}" method="POST">
                    {{--
                    * CSRF - é uma funcionalidade essencial no Laravel para proteger sua aplicação
                    * contra ataques de 'Falsificação de Requisição Entre Sites' (CSRF - Cross-Site Request Forgery).
                    --}}
                    @csrf
                    <div class="mb-3 form-group">
                        <label class="form-label" for="titulo">Titulo</label>
                        <input class="form-control" type="text" name="titulo" id="titulo">
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label" for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao"></textarea>
                    </div>

                    <div class="mb-3 form-group">
                        <label class="form-label" for="link">Link</label>
                        <input class="form-control" type="text" name="link" id="link">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{route('views.index')}}">Voltar</a>
        </div>
@endsection