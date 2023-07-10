<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Imóveis</title>
</head>

<body>
    <main>
        <center>
            <h2> Imóveis </h2>
        </center>
        @php $cep = preg_replace("/[^0-9]/", "", $dadosImoveis['avancado']['imoveis']['cep']);
        $resultado_cep = json_decode(file_get_contents("https://viacep.com.br/ws/".$cep."/json/"));
        @endphp
        @if (!$resultado_cep || isset($resultado_cep->erro))
        <p>CEP não encontrado.</p>
        @else
        <form>
            <h3>Endereço :</h3>
            <b>CEP: {{ $resultado_cep->cep }}
                <p>Logradouro: {{ $resultado_cep->logradouro }}
                <p>Bairro: {{ $resultado_cep->bairro }}
                <p>Cidade: {{ $resultado_cep->localidade }}
                <p>Estado: {{ $resultado_cep->uf }}
            </b>

            <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

        </form>
    </main>
    @endif
</body>

</html>