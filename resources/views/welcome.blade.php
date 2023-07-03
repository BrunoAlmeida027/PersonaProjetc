<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/app.css">
    <title>Pagina de Busca</title>

<body>


    <!-- Máscara de entrada para formatar CPF -->
    <script>
        function formatar(mascara, documento) {
            let i = documento.value.length;
            let saida = '#';
            let texto = mascara.substring(i);

            while (texto.substring(0, 1) != saida && texto.length) {
                documento.value += texto.substring(0, 1);
                i++;
                texto = mascara.substring(i);
            }
        }
    </script>


    <main>

        <h1>Buscar perfil</h1>

        <form method="POST" action="{{ route('PosBusca') }}">
            @csrf
            <br><label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required OnKeyPress="formatar('###.###.###-##',this)" maxLength='14'>
            <button type="submit">Buscar</button>
        </form>

        <br>
    </main>
</body>

</html>