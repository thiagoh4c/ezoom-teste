# Download
git clone git@bitbucket.org:thiagoh4c/ezoom-teste.git
	
## Rodar o projeto com docker

**Necessário**
 - Docker version 19+
 - npm 6.14.4+
 - docker-compose version 1.25.0+
 - lessc 3+

**Cria as imagens do docker e baixa os pacotes do ionic para o App**
``` bash
$ make install
```

**Cria, importa e popula o banco de dados**
``` bash
$ make database
```
### Duas opções para executar o projeto
**Inicia o docker para versão web e executa o "ionic serve" com ionic-lab**
``` bash
$ make start
```

**Inicia somente o docker para versão web**
``` bash
$ make php
```

## Rodar sem o docker
Importar o banco localizado em **./containers/mysql/Database/Project.sql**

Editar o arquivo **./html/application/config/database.php** com as permissões do banco de dados

Setar o document_root para **./html**


## URLs

**/** - página inicial

**/painel** - painel administrativo

	- login admin
	- password 123456
