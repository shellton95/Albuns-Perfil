<?php

use App\Http\Controllers\FotosController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('albuns/perfil/{id}', [FotosController::class, 'index']);
Route::post('/albuns/perfil/{id}', [FotosController::class, 'store']);
Route::get('/albuns/perfil/{albuns}/{id}', [FotosController::class, 'destroy']);

Route::get('/albuns', [UsuarioController::class, 'index'])->name('albuns.index');
Route::post('/albuns', [UsuarioController::class, 'store'])->name('albuns.store');
Route::get('/albuns/edit/{id}', [UsuarioController::class, 'edit']);
Route::post('/albuns/{id}', [UsuarioController::class, 'update'])->name('albuns.update');
Route::get('/albuns/{id}', [UsuarioController::class, 'destroy']);





//Route::get('/albuns/{id}', [UsuarioController::class, 'destroy']);
//Route::resource('/albuns',UsuarioController::class);
//Route::get('/cadastro', function(){
    //return view('cadusuario');
//});
//Route::get('/teste', function(){
    //return view('teste');
//});


//Route::resource('/albuns/conteudo',UploadController::class);

//Route::get('/albuns/conteudo/{id}', [UploadController::class, 'index'])->name('conteudo.index');

