<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
                return redirect()->route('Erro');
            }
        }
    }

    static function calcularPerfil()
    {
        $dados = Http::get('https://test.alertrack.com.br/api/test_web/profile/get')->json();

        // Definindo os pesos para cada propriedade
        $pesoRenda = 0.001;
        $pesoEmpresas = 0.3;
        $pesoImoveis = 0.15;
        $pesoVeiculo = 0.05;

        $renda = preg_replace('/\D/', '', $dados['avancado']['rendas'][0]['valorrenda']);
        $quantidadeEmpresas = count($dados['avancado']['sociedades']);
        $quantidadeImoveis = count($dados['avancado']['imoveis']);
        $possuiVeiculo = count($dados['avancado']['veiculos']);

        // Fazendo o calculo
        $pontuacao = ($renda * $pesoRenda) + ($quantidadeEmpresas * $pesoEmpresas) + ($quantidadeImoveis * $pesoImoveis) + ($possuiVeiculo * $pesoVeiculo);
        // Classificando o Perfil
        if ($pontuacao >= 5000) {
            echo  "<h1 style='color:green'>Perfil Classe A </h1>";
        } elseif ($pontuacao >= 3000) {
            echo  "<h1 style='color:yellow'>Perfil Classe B </h1>";
        } elseif ($pontuacao >= 1000) {
            echo  "<h1 style='color:orange'>Perfil Classe C </h1>";
        } else {
            echo  "<h1 style='color:red'>Perfil Classe D </h1>";
        }
    }
}
