<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Exceptions\CpfNaoIdentificadoException;


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

  public function dadosEmpresas()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    // dd($dados);
    return view('Empresas', ["dadosEmpresas" => $dados]);
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

  public function exibirDadosPessoais($cpf)
  {
    // Faça a chamada à API ou consulte o banco de dados para obter os dados do CPF fornecido
    $dadosPessoais = $this->buscarDadosPessoaisPorCPF($cpf);

    // Verifique se os dados foram encontrados
    if ($dadosPessoais) {
      return view('DadosPessoal', ["dadosPessoais" => $dadosPessoais]);
    } else {
      // Retorne uma mensagem de erro ou redirecione para uma página de erro, caso necessário
    }
  }
}
