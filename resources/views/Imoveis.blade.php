<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Imóveis</title>
</head>

<body>
    <main>
        <center>
            <h2>Imóveis</h2>
        </center>

        @if(!empty($endereco))
        <form><b>
                <p>CEP: {{ $endereco['CEP'] }}</p>
                <p>Logradouro: {{ $endereco['Logradouro'] }}</p>
                <p>Bairro: {{ $endereco['Bairro'] }}</p>
                <p>Cidade: {{ $endereco['Cidade'] }}</p>
                <p>Estado: {{ $endereco['Estado'] }}</p>
            </b>
            <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

        </form>

        @endif


    </main>
</body>

</html>