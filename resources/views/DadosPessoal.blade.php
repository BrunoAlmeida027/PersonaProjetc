<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Info.Pessoal</title>
</head>

<body>
    <main>
        <form>
            <center> <img src="{{$dadosApi ['avancado']['avatar']}}" alt="Perfil" width="200" height="200">
                <hr>
                <h2> {{$dadosApi['basico']['nome']}} </h2>
            </center>
            <p><b> Nascimento: {{$dadosApi['basico']['nascimento']}}
                    <p class="message"> Mãe: {{$dadosApi['avancado']['mae']}}
                    <p> Nacionalidade: {{$dadosApi['avancado']['nacionalidade']}}
                    <p> Email: {{$dadosApi['avancado']['email_principal']}}
                    <p> Estado Civil: {{$dadosApi['avancado']['estado_civil']}}
                    <p> Escolaridade: {{$dadosApi['avancado']['escolaridade']}}
                    <p> Valor Renda: <font color="green"> {{$dadosApi['avancado']['rendas'][0]['valorrenda']}} </font>
                    <p> Empresa Pagadora: {{$dadosApi['avancado']['rendas'][0]['empresapagadora']}}
                        <hr>
                    <h2>Telefones :</h2>
                    <h4>Contato Principal : </h4>
                    <p> Nome de contato : {{$dadosApi['avancado']['telefones'][0]['nome']}}
                    <p> Telefone: {{$dadosApi['avancado']['telefones'][0]['telefone']}}
                    <p> Tipo: {{$dadosApi['avancado']['telefones'][0]['tipo']}}
                    <h4>Contato Secundário : </h4>
                    <p> Nome de contato : {{$dadosApi['avancado']['telefones'][1]['nome']}}
                    <p> Telefone: {{$dadosApi['avancado']['telefones'][1]['telefone']}}
                    <p> Tipo: {{$dadosApi['avancado']['telefones'][1]['tipo']}}
                        <hr>
                        <h2>Endereço :</h2>

                        @php
                        $cep = preg_replace("/[^0-9]/", "", $dadosApi['avancado']['enderecos'][0]['cep']);
                        $resultado_cep = json_decode(file_get_contents("https://viacep.com.br/ws/".$cep."/json/"));
                        @endphp

                        @if (!$resultado_cep || isset($resultado_cep->erro))
                    <p>CEP não encontrado.</p>
                    @else
                    <p>CEP: {{ $resultado_cep->cep }}</p>
                    <p>Logradouro: {{ $resultado_cep->logradouro }}</p>
                    <p>Bairro: {{ $resultado_cep->bairro }}</p>
                    <p>Cidade: {{ $resultado_cep->localidade }}</p>
                    <p>Estado: {{ $resultado_cep->uf }}</p>
                    @endif


                    <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

        </form>
    </main>

</body>

</html>