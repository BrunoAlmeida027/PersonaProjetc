<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Exceptions\CpfNaoIdentificadoException;

class ImoveisController extends Controller
{
  public function dadosImoveis()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();

    $cep = preg_replace("/[^0-9]/", "", $dados['avancado']['imoveis']['cep']);
    $resultado_cep = json_decode(file_get_contents("https://viacep.com.br/ws/" . $cep . "/json/"));

    if (!$resultado_cep || isset($resultado_cep->erro)) {
    } else {
      $endereco = [

        'CEP' => $resultado_cep->cep,
        'Logradouro' => $resultado_cep->logradouro,
        'Bairro' => $resultado_cep->bairro,
        'Cidade' => $resultado_cep->localidade,
        'Estado' => $resultado_cep->uf
      ];
    }

    return view('Imoveis', ["dadosImoveis" => $dados, "endereco" => $endereco]);
  }
}
