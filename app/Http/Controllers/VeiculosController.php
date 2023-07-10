<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class VeiculosController extends Controller
{
    
  public function dadosVeiculos()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    return view('Veiculos', ["DadosVeiculosApi" => $dados]);
  }

}
