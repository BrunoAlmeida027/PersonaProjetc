<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/Erro', function(){
    return view('Erro');
});

Route::get('DadosPessoal', 'App\Http\Controllers\ApiController@dadosPessoalApi');

// ROTAS PARA PAGINA  :    P O S B U S C A 

Route::post('PosBusca', 'App\Http\Controllers\ApiController@buscarPerfil')->name('PosBusca');

Route::get('PosBusca', 'App\Http\Controllers\ApiController@dadosPosBuscaApi');

// ROTAS PARA PAGINA : V E I C U L O S 

Route::get('Veiculos', 'App\Http\Controllers\ApiController@dadosVeiculos');

// ROTAS PARA PAGINA : A S S I N A T U R A S 

Route::get('Assinatura', 'App\Http\Controllers\ApiController@assinaturas');


