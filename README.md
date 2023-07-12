# Perfil de Pessoa Física - Desafio

Este projeto Laravel tem como objetivo exibir de forma organizada e estruturada as informações relacionadas a uma pessoa, abrangendo aspectos pessoais, empresariais e serviços utilizados. A página desenvolvida visa mostrar as características e possibilidades dessa pessoa, com base em dados minerados e documentos relevantes.

## Funcionalidades

- Exibição dos dados que caracterizam a pessoa, como local de residência, idade e serviços digitais utilizados.
- Resposta a perguntas específicas, como detalhes sobre a localização, idade e serviços utilizados pela pessoa.
- Classificação de Perfil por Classe de acordo com seus dados Pessoais 

## Apoio

- A API utilizada neste projeto é a seguinte: [https://test.alertrack.com.br/api/test_web/profile/get](https://test.alertrack.com.br/api/test_web/profile/get).
- Utilização de webservices adicionais para coleta de informações, como ViaCep e ReceitaWS.

## Pré-requisitos

- Docker e Docker Compose instalados na máquina local.

## Configuração do Redis

Este projeto utiliza o Redis como cache. Certifique-se de ter o serviço do Redis em execução na sua máquina local. O Docker Compose inclui um contêiner Redis, mas se preferir utilizar uma instância externa do Redis, atualize as configurações do Laravel em `.env` para apontar para a instância correta.

## Como usar

1. Clone este repositório em sua máquina local.
2. Navegue até o diretório do projeto: `cd NewProject`.
3. Execute o comando `docker-compose up -d` para iniciar os contêineres do projeto.
4. O Laravel estará sendo executado em [http://localhost:8000](http://localhost:8000).
5. Acesse o projeto em seu navegador.
6. inclua o cpf que consta na API sendo : `019.139.545-52`