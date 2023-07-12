<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Menu de Busca</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <main>
        <form>
            <center>
                <h2>Cliente </h2>
            </center>
            @php
            $controller = new \App\Http\Controllers\PosBuscaController();
            $perfil = $controller->calcularPerfil();
            @endphp
            {{ $perfil }}
            <center>
        </form>

        <center> <img src="{{$dadosPosBuscaApi ['avancado']['avatar']}}" alt="Perfil" width="200" height="200">

            <h3> {{ $dadosPosBuscaApi['avancado']['nome'] }} </h3>

            <h3> {{ $dadosPosBuscaApi['avancado']['cpf'] }} </h3>
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

        <form method="POST" action="{{ route('imoveis', ['cpf' => $dadosPosBuscaApi['avancado']['cpf']]) }}">
            @csrf
            <!-- Botão Imóveis -->
            <button type="submit" name="botao_imoveis">Imóveis</button>
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