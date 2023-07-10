<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Dados CNPJ</title>
</head>

<body>
    <main><form>
        @foreach($empresas as $empresa)
        <h2>Empresa: {{ $empresa['Empresa'] }}</h2>
        <ul>
            @foreach($empresa as $campo => $valor)
            @if ($campo !== 'Empresa')
            <li><b>{{ $campo }}:</b> {!! $valor !!}</li>
            @endif
            @endforeach
        </ul>
        <hr>
        @endforeach
<p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

</form>

    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>