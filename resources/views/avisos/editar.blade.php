@extends('layouts.header')

@section('content')
    <h1>Editar Aviso</h1>


    <form action="{{ route('api.editar_avisos', ['id' => $dados['id']]) }}" method="POST">
        @csrf    
        <div>
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="{{$dados['titulo']}}">">
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao">{{  $dados['descricao'] }}</textarea>
        </div>

            <div>
                <label for="link">Link</label>
                <input type="text" name="link" id="link" value="{{ $dados['link'] }}">
            </div>


            <div>
                <button type="submit">Atualizar</button>
            </div>
@endsection