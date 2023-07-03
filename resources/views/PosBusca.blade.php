<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pagina de Formulario</title>
    <link rel="stylesheet" href="css/app.css">
    <title>CPF INVÁLIDO</title>
</head>

<body>



    <main>
        <h2>Cliente : </h2>
        <center>
            <h3> {{ $dadosPosBuscaApi['avancado']['nome'] }}</h3>
            <h3>
                <font color="red"> {{ $dadosPosBuscaApi['avancado']['cpf'] }}
            </h3>
            </font>
        </center>

        <Form>

            <input type="hidden" id="cpf_id" value="" name="cpf">
            <!-- Botao Dados Pessoais -->
            <input type="submit" name="botao_dados" value="Inf. Pessoal" >
            <!-- Botao Dados CNPJ -->
            <input type="submit" name="botao_cnpj" value="Dados CNPJ">
            <!-- Botao Veiculos -->
            <input type="submit" name="botao_veiculos" value="Veículos">
            <!-- Botao Imoveis -->
            <input type="submit" name="botao_imoveis" value="Imoveis">
            <!-- Botao Assinaturas -->
            <input type="submit" name="botao_assinaturas" value="Assinaturas">
            <!-- Botao Telefones -->
            <input type="submit" name="botao_telefones" value="Telefones">
            </Form:post>

            <!-- Botão de voltar Página  -->
            <p><a href="javascript:history.go(-1)"> Voltara a Página de Busca </a></p>

    </main>


</body>

</html>