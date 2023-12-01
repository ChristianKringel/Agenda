<?php

use App\Http\Controllers\AutenticationController;
use App\Http\Controllers\ContatosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BuscaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('contatos.showNomes');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/addContato', function () {
    return view('addContato');
});

Route::get('/registroContatos', function () {
    return view('registroContatos');
});

Route::get('/meu-login', function () {
    return view('meu-login');
});

Route::get('/novoMenu', function () {
    return view('novoMenu');
});
Route::get('/teste', function () {
    return view('teste');
});

Route::get('/contatos/detalhes/{nome}', [ContatosController::class, 'show'])->name('contatos.showDetalhes');
Route::get('/contatos/nomes', [ContatosController::class, 'showNomes'])->name('contatos.showNomes');
Route::get('/', [ContatosController::class, 'showNomes'])->name('contatos.showNomes');
Route::post('/contatos/excluirContato/{id}', [ContatosController::class, 'excluirContato'])->name('contatos.excluirContato');
Route::get('/contatos/edit/{id}', [ContatosController::class, 'edit'])->name('contatos.edit');
Route::put('/contatos/update/{id}', [ContatosController::class, 'update'])->name('contatos.update');
Route::get('/busca', [BuscaController::class, 'index'])->name('contatos.busca');



Route::post('/autentication', [AutenticationController::class, 'store']);

Route::post('/contatos', [ContatosController::class, 'store']);

Route::post('/loginController', [LoginController::class, 'store']);



//Route::post('/minhalogout', [LoginController::class, 'logout'])->name('minhalogout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
