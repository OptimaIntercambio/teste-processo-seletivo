# Teste processo seletivo desenvolvedor Full-Stack PHP
Neste teste será avaliado sua forma de trabalhar, a qualidade de seu código e a solução adotada, portanto não haverá certo ou errado.

## Descrição do teste

### Back-end

Você deverá criar em Laravel (utilize a versão a sua escolha) e de preferencia utilizando algum banco de dados SQL como por exemplo MySQL ou Postgree os seguintes CRUD's (acrónimo do inglês Create, Read, Update and Delete) são as quatro operações básicas (criação, consulta, atualização e destruição de dados.

**Mateus Brust - obs para exclusão, no meu computador necessitou esperar um pouco para carregar o javascript para realizar a explusão.**

1. Idiomas;
2. Moedas;
**Obs.:** no ato da criação e atualização das moedas, você deverá consumir uma API para registar a cotação atual do câmbio. Recomendamos utilizar a https://docs.awesomeapi.com.br/api-de-moedas pela gratuidade e facilidade de uso.
3. Países.

**Mateus Brust - obs: Não tive tempo para implementar a api, porém é possível realizar a inclusão.**

Você tem a livre escolha de modelar estas entidades na forma que achar melhor, no entanto fazemos apenas uma observação para a tabela de moedas na qual deverá registrar o câmbio (se julgar necessário, crie uma tabela de câmbio).

**Mateus Brust - obs: Resolvi criar o campo "dolar" na tabela moeda que resolve tudo padronizando todas as moedas para dolar. Sendo possível verificar o valor da sua moeda atual.**

### Front-end

Você deverá criar todas as telas do CRUD utilizando o próprio Blade Template do Laravel juntamente com algum framework front-end tais como Bootstrap, Materializa etc.

**Mateus Brust - obs: Foi utilizado o modelo resource com as chamadas para o crud. Reutilizando o código, para melhor manutenção.**

#### Pontos obrigatórios
1. Utilizar o Git (crie uma branch deste repositório com seu nome e após finalizar o teste submeta um Pull-request de sua branch);
2. Utilizar migrations do Laravel.

**Mateus Brust - obs: utilizado. criada a branch Mateus-Brust**

#### Diferenciais
1. Utilize seeds para pré-popular seu banco;
2. Utilize Docker para não termos problema de compatibilidade em nossa máquina ou nos mande um link do projeto em funcionamento em um servidor de sua preferência caso haja

Quaisquer dúvidas, enviar um email para it@optimaintercambio.com.br.
Bom teste!


**Mateus Brust - obs:  Foi utilizado o seed para popular o banco e realizar os testes.**

Obs.: Após instalar o docker, apresentou mensagem de erro. Verificado que meu computador é Razer. É necessário configurar para poder funcionar corretamento. Como é "Diferencial" optei por não perder tempo configurando.

Configurações do teste

XAMPP
Versão do PHP: PHP 7.4.8
Versão do Laravel: Laravel Framework 6.18.40
SO: Win10