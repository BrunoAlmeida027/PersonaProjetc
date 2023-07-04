<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>

<body>
    @php
    $cnpj1 = $dadosEmpresas['avancado']['sociedades'][0]['cnpjempresasocio'];
    $resultado_cnpj1 = json_decode(file_get_contents("https://receitaws.com.br/v1/cnpj/" . $cnpj1));
    $cnpj2 = $dadosEmpresas['avancado']['sociedades'][1]['cnpjempresasocio'];
    $resultado_cnpj2 = json_decode(file_get_contents("https://receitaws.com.br/v1/cnpj/" . $cnpj2));
    @endphp

    @if (!$resultado_cnpj1 || isset($resultado_cnpj1->erro))
    CNPJ INVÁLIDO
    @else
    <main><br>
        <form>
            @php
            $campocnpj1 = [
            'Empresa' => $resultado_cnpj1->nome,
            'CNPJ' => $resultado_cnpj1->cnpj,
            'Status' => $resultado_cnpj1->status,
            'Tipo da Empresa' => $resultado_cnpj1->tipo,
            'Porte' => $resultado_cnpj1->porte,
            'Participação Sociedade' => $dadosEmpresas['avancado']['sociedades'][1]['participacaosociedade'],
            'Data de Abertura' => $resultado_cnpj1->abertura,
            'Natureza Jurídica' => $resultado_cnpj1->natureza_juridica,
            'logradouro' => $resultado_cnpj1->logradouro,
            'Número' => $resultado_cnpj1->numero,
            'Complemento' => $resultado_cnpj1->complemento,
            'CEP' => $resultado_cnpj1->cep,
            'Capital' => $resultado_cnpj1->capital_social
            ];

            $campocnpj2 = [
            'Empresa' => $resultado_cnpj2->nome,
            'CNPJ' => $resultado_cnpj2->cnpj,
            'Status' => $resultado_cnpj2->status,
            'Tipo da Empresa' => $resultado_cnpj2->tipo,
            'Porte' => $resultado_cnpj2->porte,
            'Participação Sociedade' => $dadosEmpresas['avancado']['sociedades'][1]['participacaosociedade'],
            'Data de Abertura' => $resultado_cnpj2->abertura,
            'Natureza Jurídica' => $resultado_cnpj2->natureza_juridica,
            'logradouro' => $resultado_cnpj2->logradouro,
            'Número' => $resultado_cnpj2->numero,
            'Complemento' => $resultado_cnpj2->complemento,
            'CEP' => $resultado_cnpj2->cep,
            'Capital' => $resultado_cnpj2->capital_social
            ];
            @endphp

            @foreach([$campocnpj1, $campocnpj2] as $campos)
            <h2>Empresa: {{ $campos['Empresa'] }}</h2>
            @foreach($campos as $campo => $valor)
            @if($campo !== 'Empresa')
            <b>{{ $campo }}:</b>
            <b>{!! $valor !!}</b><br>
            @endif
            @endforeach
            <hr>
            @endforeach
            <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>
        </form>

    </main>
    @endif


</body>

</html>