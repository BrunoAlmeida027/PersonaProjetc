<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Assinaturas DIgital</title>
</head>

<body>
    <main>
    <h3>Assinaturas :</h3>
        <form>
            @foreach ($assinaturasApi['avancado']['servicos'] as $servico => $detalhes)
            @if ($detalhes['status'])
           <b> <p>{{ $servico }}: <font color= "green">Ativo</font></p>
            @else
            <p>{{ $servico }}: <font color= "red">Inativo</font></p>
            @endif
            @endforeach
        </form>
    <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

    </main>

</body>

</html>