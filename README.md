<p align="center">
  <img width="460" height="350" src="https://pedropsilva.com.br/images/portfolio/projects/project_two.png">
</p>

# API Cobrança de Assinaturas

Essa API foi desenvolvida utilizando a arquitetura REST. Ela foi solicitada como parte de um processo seletivo da empresa Dourasoft. Com esse serviço, é possível efetuar o gerenciamento de cadastros, assinaturas e faturas.<br>

Para uma maior facilidade em efetuar validações locais, os seeders e factories foram também previamente configurados, deste modo, para outros desenvolvedores que clonarem o projeto, não existe a necessidade de cadastrar os dados manualmente ao criar as migrations.

A API possui um schedule que verifica assinaturas que vencem daqui a 10 dias, essas assinaturas são convertidas em fatura e não podem ser convertidas mais de uma vez.<br><br>

## O que foi feito
- ✅ CRUD Listagem/Inclusão/Edição/Exclusão de Cadastros.
- ✅ CRUD Listagem/Inclusão/Edição/Exclusão de Assinaturas.
- ✅ CRUD Listagem/Inclusão/Edição/Exclusão de Faturas.
- ✅ Deve possuir uma Task que verifica uma vez ao dia todas as assinaturas que vencem daqui a 10 dias e converta elas em faturas.
- ✅ A Task não pode converter faturas já convertidas hoje.
- ✅ Utilizar composer.
- ✅ Utilizar qualquer Framework PHP. Caso opte por não utilizar, desenvolver nos padrões de projeto MVC.
- ✅ Utilizar o Postman para documentar a API. Exporte a documentação junto ao projeto na pasta docs.
- ✅ Criar as Migrations.
- ✅ Criar os Seeds<br><br>


## Algumas IDEs recomendadas

* [PHP Storm](https://www.jetbrains.com/pt-br/phpstorm/)
* [Visual Studio Code](https://code.visualstudio.com/)<br><br>

## Customizar Configurações

Veja: [Laravel Configuration Reference](https://laravel.com/docs/11.x/configuration).<br><br>

## Configurações do projeto

### Clonar o projeto
```sh
git clone https://github.com/pedro-p-silva/desafio-assinaturas.git
```

### Instalar o gerenciador de pacotes

```sh
npm install
```

### Duplicar o arquivo .env.example e renomear o arquivo duplicado para ".env". Posteriormente, adicionar as informações de conexão do banco de dados no arquivo renomeado.<br>

### Instalar o gerenciador de dependências

```sh
composer install
```

### Gerando a chave APP_KEY no arquivo .env

```sh
php artisan key:generate
```

### Migração das tabelas do banco de dados

```sh
php artisan migrate
```

### Populando as tabelas migradas

```sh
php artisan db:seed
```

### Para testar o schedule localmente

```sh
php artisan schedule:work
```
<br>

## Skills utilizadas
<div style="display: inline_block">
  <img align="center" title="PHP" alt="Pedro-PHP" height="40" width="50" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg">
  <img align="center" title="Laravel" alt="Pedro-Laravel" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg">
  <img align="center" title="MySQL" alt="Pedro-Mysql" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg">
</div>
