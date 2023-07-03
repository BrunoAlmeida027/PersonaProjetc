<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
  public function dadosPessoalApi()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    // dd($dados);
    return view('DadosPessoal', ["dadosApi" => $dados]);
  }

  public function dadosPosBuscaApi()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    // dd($dados);
    return view('PosBusca', ["dadosPosBuscaApi" => $dados]);
  }

  public function dadosVeiculos()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    // dd($dados);
    return view('Veiculos', ["DadosVeiculosApi" => $dados]);
  }

  public function assinaturas()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    // dd($dados);
    return view('Assinatura', ["assinaturasApi" => $dados]);
  }

  public function buscarPerfil(Request $request)
  {
    $cpf = $request->input('cpf');

    // Faça a chamada à API para obter os dados do perfil
    $response = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();

    // Verifique se o CPF digitado corresponde ao CPF da API
    if ($response['avancado']['cpf'] === $cpf) {
      // CPF válido, redirecione para a página PosBusca
      return redirect('/PosBusca');
    } else {
      // CPF inválido, redirecione para uma página de erro
      return redirect('/Erro')->with('message', 'CPF inválido. Verifique o CPF e tente novamente.');
    }
  }

 
      
  }
  

