<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Veículos</title>
</head>

<body>
    <main>
        <center>
            <h2> Automóveis </h2>
        </center>

        <form>

            <p><b> Placa: {{$DadosVeiculosApi['avancado']['veiculos'][0]['placa']}}
                    <p> Modelo: {{$DadosVeiculosApi['avancado']['veiculos'][0]['marcamodelo']}}
                    <p> Ano Modelo: {{$DadosVeiculosApi['avancado']['veiculos'][0]['anomodelo']}}
                    <p> Ano Fabricação: {{$DadosVeiculosApi['avancado']['veiculos'][0]['anobase']}}



                    <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

        </form><b>
</body>

</html>