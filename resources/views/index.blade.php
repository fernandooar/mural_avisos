@extends('layouts.header') {{-- IMPORTANTE: Estende o layout app.blade.php --}}
@extends('components.card_teste')
@section('content') {{-- Preenche o slot 'content' do layout --}}
<div class="jumbotron bg-light p-4 rounded-3">
    <h1 class="display-4">Bem-vindo ao Mural de Avisos</h1>
    <p class="lead">Este é o mural de avisos, aqui serão publicados todos os avisos importantes.</p>
    <hr class="my-4">    
</div>

<div class="row mt-5 border-top border-bottom border-dark pt-4">
    @foreach ($avisos as $aviso)
    <div class="col-md-4 ">
        <div class="card mb-4 shadow-lg border-primary">
            <div class="card-body">
               
                <h5 class="card-title">{{ $aviso->titulo }}</h5>
                <p class="card-text">{{ $aviso->descricao }}</p>
                <a href="{{ $aviso->link }}" class="btn btn-sm btn-outline-secondary">Ver Mais</a>
                <a href="{{ route('views.editar', ['id' => $aviso->id]) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                <a href="{{ route('api.excluir_avisos', ['id' => $aviso->id]) }}"class="btn btn-sm btn-outline-danger">Excluir</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>
@endsection
{{--
    * Exemplo de CSS e JavaScript adicionais para esta página.
    * Estes estilos e scripts serão carregados apenas nesta página, se necessário.
    * Você pode adicionar estilos personalizados ou scripts específicos aqui.
*/
--}}
@push('styles') {{-- Exemplo de CSS adicional para esta página --}}
<style>
    /* .jumbotron {
            background-color:rgb(23, 67, 112);
            padding: 2rem;
            border-radius: .3rem;
        } */
</style>
@endpush

@push('scripts') {{-- Exemplo de JavaScript adicional para esta página --}}
<script>
    console.log('Script específico da página inicial carregado.');
</script>
@endpush
<?php

use App\Models\Aviso;
use App\Models\Tag;
use App\Models\Usuario;

$usuario = Usuario::find(1);
$usuarios = Usuario::All();
?>

