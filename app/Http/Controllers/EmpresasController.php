<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EmpresasController extends Controller
{
    
   
    public function dadosEmpresas()
    {
      

        $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();
        $empresas = [];

        foreach ($dados['avancado']['sociedades'] as $socio) {
            $cnpj = $socio['cnpjempresasocio'];
            $resultado_cnpj = json_decode(file_get_contents("https://receitaws.com.br/v1/cnpj/" . $cnpj));

            if (isset($resultado_cnpj->erro)) {
                continue;
            }

            $empresa = [
                'Empresa' => $resultado_cnpj->nome,
                'CNPJ' => $resultado_cnpj->cnpj,
                'Status' => $resultado_cnpj->status,
                'Tipo da Empresa' => $resultado_cnpj->tipo,
                'Porte' => $resultado_cnpj->porte,
                'Participação Sociedade' => $socio['participacaosociedade'],
                'Data de Abertura' => $resultado_cnpj->abertura,
                'Natureza Jurídica' => $resultado_cnpj->natureza_juridica,
                'logradouro' => $resultado_cnpj->logradouro,
                'Número' => $resultado_cnpj->numero,
                'Complemento' => $resultado_cnpj->complemento,
                'CEP' => $resultado_cnpj->cep,
                'Capital' => $resultado_cnpj->capital_social
            ];

            $empresas[] = $empresa;
        }

        return view('Empresas', ['empresas' => $empresas]);
    }

  
}
