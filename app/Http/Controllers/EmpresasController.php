<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EmpresasController extends Controller
{
    public function dadosEmpresas()
  {
    $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
    return view('Empresas', ["dadosEmpresas" => $dados]);
  }

  
}
