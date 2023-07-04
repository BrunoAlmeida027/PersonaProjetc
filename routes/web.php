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

Route::post('DadosPessoal', 'App\Http\Controllers\ApiController@dadosPessoalApi');
Route::get('DadosPessoal', 'App\Http\Controllers\ApiController@exibirDadosPessoais')->name('dadosPessoal');

// ROTAS PARA PAGINA  :    P O S B U S C A 

Route::post('PosBusca', 'App\Http\Controllers\ApiController@buscarPerfil')->name('PosBusca');

Route::get('PosBusca', 'App\Http\Controllers\ApiController@dadosPosBuscaApi');

// ROTAS PARA PAGINA : V E I C U L O S 

Route::post('Veiculos', 'App\Http\Controllers\ApiController@dadosVeiculos');
Route::get('/Veiculos', 'ApiController@exibirVeiculos')->name('veiculos');

// ROTAS PARA PAGINA : A S S I N A T U R A S 

Route::post('Assinatura', 'App\Http\Controllers\ApiController@assinaturas')->name('assinaturas');

// ROTAS PARA PAGINA : E M P R E S A S 

Route::get('Empresas', 'App\Http\Controllers\ApiController@dadosEmpresas');

Route::post('Empresas', 'App\Http\Controllers\ApiController@dadosEmpresas')->name('dadosCNPJ');

// ROTAS PARA PAGINA : I M O V E I S 

Route::get('Imoveis', 'App\Http\Controllers\ApiController@dadosImoveis');
Route::post('Imoveis', 'App\Http\Controllers\ApiController@dadosImoveis')->name('imoveis');


