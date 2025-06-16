
    @extends('layouts.app')

    @section('content')
    <div>
    <h1>Cadastrar Aviso</h1>
        <h3>Cadastrar aviso</h3>
        <form action="{{Route('api.cadastro_avisos')}}" method="POST">
            @csrf
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo">
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"></textarea>
            </div>

            <div>
                <label for="link">Link</label>
                <input type="text" name="link" id="link">
            </div>


            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
    <div>
        <a href="{{route('views.index')}}">Voltar</a>
    </div>
@endsection