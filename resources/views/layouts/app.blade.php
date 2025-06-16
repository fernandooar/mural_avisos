 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title', 'Mural de Avisos Laravel')</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

     @stack('styles') {{-- Para CSS específico de páginas filhas --}}
 </head>
<?php
use App\Models\Usuario;
$usuario = Usuario::find(1); // Substitua 1 pelo ID do usuário que você deseja exibir
?>
 <body>
     @section('header') {{-- Este é o slot onde o cabeçalho será inserido --}}
     <header>
         <div class="container-fluid" style="margin-top: 120px;">
             <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow fixed-top" ">
             <div class=" container">
                 <a class="navbar-brand" href="#">Navbar</a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                             <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 Avisos
                             </a>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="{{route('views.cadastro')}}">Cadastrar</a></li>
                                 <li><a class="dropdown-item" href="#">Link 1</a></li>
                                 <li><a class="dropdown-item" href="#">Link 2</a></li>
                             </ul>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 Usuários
                             </a>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="{{route('views.index')}}">Listar Usuários</a></li>
                                 <li><a class="dropdown-item" href="{{route('views.editar', ['id' => $usuario->id]) }}">Editar</a></li>
                                 <li><a class="dropdown-item" href="{{route('views.cadastrar')}}">Cadastrar</a></li>
                             </ul>
                         </li>
                     </ul>

                 </div>
                 <div class="d-flex align-items-center border p-2 rounded text-white gap-2">
                     <i class="bi bi-person-circle me-2"></i>
                     <span>{{$usuario->nome}}</span> <i class="bi bi-arrow-right"></i> <span>{{$usuario->email}}</span>
                 </div>
         </div>
         </nav>
         </div>
     </header>

     <main class="container mt-4">
         @yield('content') {{-- Este é o slot onde o conteúdo específico da página será inserido --}}
     </main>

     <main class="container mt-4">
         @yield('contentUsuarios') {{-- Este é o slot onde o conteúdo específico da página de usuários será inserido --}}
         <footer class="bg-light text-center py-3 mt-5">
             <p>&copy; {{ date('Y') }} Mural de Avisos Laravel. Todos os direitos reservados.</p>
         </footer>

         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

         @stack('scripts') {{-- Para JS específico de páginas filhas --}}
 </body>

 </html>