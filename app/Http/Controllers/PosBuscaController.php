<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Exceptions\CpfNaoIdentificadoException;

class PosBuscaController extends Controller
{

    public function dadosPosBuscaApi()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    return view('PosBusca', ["dadosPosBuscaApi" => $dados]);
  }

  public function buscarPerfil(Request $request)
  {
    // Verificar se o campo "cpf" está presente na solicitação
    if ($request->has('cpf')) {
      $cpf = $request->input('cpf');

      // Faça a chamada à API para obter os dados do perfil

      $response = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();

      // Verificar se o CPF digitado corresponde ao CPF da API
      if ($response['avancado']['cpf'] === $cpf) {
        // CPF válido, redirecione para a página PosBusca
        return redirect()->route('PosBusca');
      } else {
        // CPF inválido, lance a exceção
        throw new CpfNaoIdentificadoException();
      }
    }
  }
}
