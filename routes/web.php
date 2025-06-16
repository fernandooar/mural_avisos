<?php

use App\Http\Controllers\AvisoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UsuarioController;
use App\Models\Aviso;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use illuminate\Http\Request;


/**
 * Define a rota para a página inicial da aplicação.
 *
 * Quando uma requisição GET é feita para a URL raiz ('/'), esta rota recupera todos os registros
 * do modelo Aviso e os passa para a view 'index' como a variável 'avisos'.
 *
 * @return \Illuminate\View\View
 * @rota GET /
 * @nome home
 */
Route::get('/', function () {
    $avisos = Aviso::all();
    return view('index', ['avisos' => $avisos]);
})->name('home');

Route::prefix('/avisos')->group(function (){
    Route::get('/cadastro', [AvisoController::class, 'cadastro'])->name('views.cadastro');
    Route::get('/editar/{id}', [AvisoController::class, 'edicao'])->name('views.editar');

});

Route::prefix('/processosAvisos')->group(function(){
    Route::post('/cadastro', [AvisoController::class, 'postCadastro'])->name('api.cadastro_avisos');
    Route::post('/editar', [AvisoController::class, 'postEdicao'])->name('api.editar_avisos');
    Route::get('/excluir/{id}', [AvisoController::class, 'delete'])->name('api.excluir_avisos');
});

Route::prefix('/usuarios')->group(function () {
    Route::get('/cadastrar', [UsuarioController::class, 'cadastrar'])->name('views.cadastrar');
    Route::get('/editar/{id}', [UsuarioController::class, 'edicao'])->name('views.editar');
    Route::get('/listar', [UsuarioController::class, 'listar'])->name('views.index');

});

Route::prefix('/processosUsuarios')->group(function () {
    Route::post('/cadastro', [UsuarioController::class, 'postUsuario'])->name('api.cadastrar_usuario');
    Route::post('/editar', [UsuarioController::class, 'postEdicao'])->name('api.editar_usuario');
    Route::get('/excluir/{id}', [UsuarioController::class, 'delete'])->name('api.excluir_usuario');

});


