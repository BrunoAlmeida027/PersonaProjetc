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

// ROTA PARA PAGINA :    E R R O

Route::view('Erro', 'Erro')->name('Erro');

// ROTA PARA PAGINA : D A D O S - P E S S O A L

Route::post('DadosPessoal', 'App\Http\Controllers\ApiController@dadosPessoalApi');
Route::get('DadosPessoal', 'App\Http\Controllers\ApiController@exibirDadosPessoais')->name('dadosPessoal');

// ROTAS PARA PAGINA  :    P O S B U S C A 

Route::post('PosBusca', 'App\Http\Controllers\PosBuscaController@buscarPerfil')->name('PosBusca');
Route::get('PosBusca', 'App\Http\Controllers\PosBuscaController@dadosPosBuscaApi');

// ROTAS PARA PAGINA : V E I C U L O S 

Route::post('Veiculos', 'App\Http\Controllers\VeiculosController@dadosVeiculos');
Route::get('/Veiculos', 'VeiculosController@exibirVeiculos')->name('veiculos');

// ROTAS PARA PAGINA : A S S I N A T U R A S 
Route::get('Empresas', 'App\Http\Controllers\AssinaturasController@exibirassinaturas');

Route::post('Assinatura', 'App\Http\Controllers\AssinaturasController@assinaturas')->name('assinaturas');

// ROTAS PARA PAGINA : E M P R E S A S 

Route::get('Empresas', 'App\Http\Controllers\EmpresasController@exibirEmpresas');

Route::post('Empresas', 'App\Http\Controllers\EmpresasController@dadosEmpresas')->name('dadosCNPJ');


// ROTAS PARA PAGINA : I M O V E I S 

Route::get('Imoveis', 'App\Http\Controllers\ImoveisController@exibirImoveis');
Route::post('Imoveis', 'App\Http\Controllers\ImoveisController@dadosImoveis')->name('imoveis');
