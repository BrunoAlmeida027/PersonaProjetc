<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Página de Formulário</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <main>
        <h2>Cliente:</h2>
        <center>
            <h3>{{ $dadosPosBuscaApi['avancado']['nome'] }}</h3>
            <h3><font color="red">{{ $dadosPosBuscaApi['avancado']['cpf'] }}</font></h3>
        </center>
            
        <form method="POST" action="{{ route('dadosPessoal', ['cpf' => $dadosPosBuscaApi['avancado']['cpf']]) }}">
            @csrf
            <!-- Botão Dados Pessoais -->
            <button type="submit" name="botao_dados_pessoais">Dados Pessoais</button>
        </form>

        <form method="POST" action="{{ route('dadosCNPJ', ['cpf' => $dadosPosBuscaApi['avancado']['cpf']]) }}">
            @csrf
            <!-- Botão Dados CNPJ -->
            <button type="submit" name="botao_cnpj">Dados CNPJ</button>
        </form>

        <form method="POST" action="{{ route('veiculos', ['cpf' => $dadosPosBuscaApi['avancado']['cpf']]) }}">
            @csrf
            <!-- Botão Veículos -->
            <button type="submit" name="botao_veiculos">Veículos</button>
        </form>

        <form method="POST" action="{{ route('assinaturas', ['cpf' => $dadosPosBuscaApi['avancado']['cpf']]) }}">
            @csrf
            <!-- Botão Assinaturas -->
            <button type="submit" name="botao_assinaturas">Assinaturas</button>
        </form>

        <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>
        

    </main>
</body>

</html>