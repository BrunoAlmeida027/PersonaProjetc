<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class AssinaturasController extends Controller
{
  public function assinaturas()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    return view('Assinatura', ["assinaturasApi" => $dados]);
  }
}
