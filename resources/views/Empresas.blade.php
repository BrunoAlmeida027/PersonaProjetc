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

    @php $cnpj1 = $dadosEmpresas['avancado']['sociedades'][0]['cnpjempresasocio'];
    $resultado_cnpj1 = Json_decode(file_get_contents("https://receitaws.com.br/v1/cnpj/".$cnpj1));
    @endphp

    @php $cnpj2 = $dadosEmpresas['avancado']['sociedades'][1]['cnpjempresasocio'];
    $resultado_cnpj2 = Json_decode(file_get_contents("https://receitaws.com.br/v1/cnpj/".$cnpj2));
    @endphp

    @if (!$resultado_cnpj1 || isset ($resultado_cnpj1->erro))
    echo " CNPJ INVÁLIDO";
    @else
    <main><br>
        <form>
            <h2>Empresa: {{$resultado_cnpj1->nome }} </h2>
            <b><br>CNPJ: {{$resultado_cnpj1->cnpj}}
                <b><br>Status: <font color=green> {{$resultado_cnpj1->status}}</font>
                    <b><br>Tipo da Empresa: {{$resultado_cnpj1->tipo}}
                        <b><br>Porte: {{$resultado_cnpj1->porte}}
                            <b><br>Participação Sociedade: {{$dadosEmpresas['avancado']['sociedades'][1]['participacaosociedade']}} %
                                <b><br>Data de Abertura: {{$resultado_cnpj1->abertura}}
                                    <b><br>Natureza Jurídica: {{ $resultado_cnpj1->natureza_juridica}}
                                        <b><br>logradouro: {{$resultado_cnpj1->logradouro}}
                                            <b><br>Número: {{$resultado_cnpj1->numero}}
                                                <b><br>Complemento: {{$resultado_cnpj1->complemento}}
                                                    <b><br>CEP: {{$resultado_cnpj1->cep}}
                                                        <b><br>Capital: <font color=green> R$ {{ $resultado_cnpj1->capital_social}}</font><br>
                                                            <hr>

                                                            <h2>Empresa: {{$resultado_cnpj2->nome }} </h2>
                                                            <b><br>CNPJ: {{$resultado_cnpj2->cnpj}}
                                                                <b><br>Status: <font color=green> {{$resultado_cnpj2->status}}</font>
                                                                    <b><br>Tipo da Empresa: {{$resultado_cnpj2->tipo}}
                                                                        <b><br>Porte: {{$resultado_cnpj2->porte}}
                                                                            <b><br>Participação Sociedade: {{$dadosEmpresas['avancado']['sociedades'][1]['participacaosociedade']}} %
                                                                                <b><br>Data de Abertura: {{$resultado_cnpj2->abertura}}
                                                                                    <b><br>Natureza Jurídica: {{ $resultado_cnpj2->natureza_juridica}}
                                                                                        <b><br>logradouro: {{$resultado_cnpj2->logradouro}}
                                                                                            <b><br>Número: {{$resultado_cnpj2->numero}}
                                                                                                <b><br>Complemento: {{$resultado_cnpj2->complemento}}
                                                                                                    <b><br>CEP: {{$resultado_cnpj2->cep}}
                                                                                                        <b><br>Capital: <font color=green> R$ {{ $resultado_cnpj2->capital_social}}</font><br>
                                                                                                            @endif
        </form>
        <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

    </main>


</body>

</html>