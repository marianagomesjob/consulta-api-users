
# Integração com API de busca com usuários

## Instalação

Este projeto tem algumas dependências e usa o *composer* para gerenciá-lo, e você pode instalar esses pacotes usando:

```
$ cd /path/to/the/project
$ composer install
```

Após a finalização da instalação das dependências, copie o arquivo `.env.example` com o nome somente `.env` .
Coloque as configurações do banco de dados no arquivo `.env`, como exemplo abaixo:

```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=nomedobanco  
DB_USERNAME=usuariodobanco  
DB_PASSWORD=senha
```

Após editar, execute os comandos abaixo:

```
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```

Após rodar o servidor do Laravel, acesse o endereço http://127.0.0.1:8000

## Instalação em servidor remoto

Para instalar em um servidor remoto, os pré-requisitos devem ser atendidos

 - PHP >= 7.2 
 - Git instalado 
 - Composer instalado

Clone o repositório no servidor, direcione o domínio/subdomínio para a pasta `/public` do projeto.

Execute os procedimentos abaixo:

```
$ cd /path/to/the/project
$ composer install

```

Após a finalização da instalação das dependências, copie o arquivo  `.env.example`  com o nome somente  `.env`  .  
Coloque as configurações do banco de dados no arquivo  `.env`, como exemplo abaixo:

```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=nomedobanco  
DB_USERNAME=usuariodobanco  
DB_PASSWORD=senha
```

Após editar, execute o comando abaixo:

```
$ php artisan key:generate
```

Pronto, agora só acessar a URL da sua aplicação na web.

## Detalhes

Foi utilizado o Framework PHP Laravel, na versão 5.7.

### Views

A estrutura de views ficou a seguinte:
`resources/views/layouts/app.blade.php` - View de layout, com estrutura de menus e CSS/JS.
`resources/views/search/index.blade.php` - View do formulário de pesquisa e resultados, estendendo do layouts.app

### Models

O Model Search é responsável pela manipulação dos dados no Banco.

Está localizado na pasta `app/Domains/Searches/Search.php`.

### Controllers

O controller responsável pela pesquisa está localizado na pasta `app/Http/Controllers/SearchController.php`, e tem os seguintes métodos:

Variável estática `$base_uri` é a base da API para consultas.

#### index

Recebe como parâmetro o Request da aplicação.

Verifica se os campos `name` e `cpf` existem, se sim, faz a busca na API e retornam para a view `search.index`. Se não existirem ou estiver `null`, retorna somente a view.

#### history

Mostra o histórico de pesquisas realizadas, consulta diretamente no banco de dados através do model.
