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
            <b> Nascimento: {{$dadosApi['basico']['nascimento']}}
                <br class="message"> Mãe: {{$dadosApi['avancado']['mae']}}
                <br>Nacionalidade: {{$dadosApi['avancado']['nacionalidade']}}
                <br>Email: {{$dadosApi['avancado']['email_principal']}}
                <br>Estado Civil: {{$dadosApi['avancado']['estado_civil']}}
                <br>Escolaridade: {{$dadosApi['avancado']['escolaridade']}}
                <br>Valor Renda: <font color="green"> {{$dadosApi['avancado']['rendas'][0]['valorrenda']}} </font>
                <br>Empresa Pagadora: {{$dadosApi['avancado']['rendas'][0]['empresapagadora']}}
                <hr>
                <h2>Telefones :</h2>
                <h4>Contato Principal :</h4>
                Nome de contato : {{$dadosApi['avancado']['telefones'][0]['nome']}}
                <br>Telefone: {{$dadosApi['avancado']['telefones'][0]['telefone']}} |
                Tipo: {{$dadosApi['avancado']['telefones'][0]['tipo']}}
                <p>
                <h4>Contato Secundário : </h4>
                Nome de contato : {{$dadosApi['avancado']['telefones'][1]['nome']}}
                <br>Telefone: {{$dadosApi['avancado']['telefones'][1]['telefone']}} |
                Tipo: {{$dadosApi['avancado']['telefones'][1]['tipo']}}
                <hr>
                <h2>Endereço :</h2>
                @php $cep = preg_replace("/[^0-9]/", "", $dadosApi['avancado']['enderecos'][0]['cep']);
                $resultado_cep = json_decode(file_get_contents("https://viacep.com.br/ws/".$cep."/json/"));
                @endphp
                @if (!$resultado_cep || isset($resultado_cep->erro))
                <br>CEP não encontrado.</p>
                @else
                CEP: {{ $resultado_cep->cep }}
                <br>Logradouro: {{ $resultado_cep->logradouro }}
                <br>Bairro: {{ $resultado_cep->bairro }}
                <br>Cidade: {{ $resultado_cep->localidade }}
                <br>Estado: {{ $resultado_cep->uf }}
                @endif


                <p><a href="javascript:history.go(-1)"> Voltar para a página anterior </a></p>

        </form>
    </main>

</body>

</html>