 
 <main class="container mt-4">
         @yield('contentUsuarios') {{-- Este é o slot onde o conteúdo específico da página de usuários será inserido --}}
         <footer class="bg-light text-center py-3 mt-5">
             <p>&copy; {{ date('Y') }} Mural de Avisos Laravel. Todos os direitos reservados.</p>
         </footer>

         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

         @stack('scripts') {{-- Para JS específico de páginas filhas --}}
     </main>
 </body>

 </html>