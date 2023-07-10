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
    return view('Imoveis', ["dadosImoveis" => $dados]);
  }
}
