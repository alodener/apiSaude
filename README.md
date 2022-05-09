# APISaude

## API de teste da TI SAUDE

## Instalação

Clone o repositório raíz

```sh
git clone https://github.com/alodener/apiSaude
```

onde usamos o [LaraDock](http://laradock.io/) para montar o ambiente da aplicação.

Entre na pasta laradock, localizada na raíz do projeto, e faça uma cópia de .env.example para configurar o ambiente.
No env copiado modifique as configurações referente ao banco de dados
name=root
senha=root
database=default
host=mariabd

Faça o mesmo com o .env.example na pasta raíz do projeto
Após, execute os containers necessários

```sh
sudo docker compose up -d nginx mariadb redis
```

O ambiente deve estar rodando no navegador em:

```sh
http://localhost:8081
```

Com o ambiente configurado, execute o comando:

```sh
sudo docker-compose exec workspace bash
```

e execute o comando abaixo:

```sh
composer install
```

ao finalizar, execute as migrações de banco de dados:

```sh
php artisan migrate
```

Rode o comando para gerar a key secret do _JWT_

```sh
php artisan jwt:secret
```

Rode o comando para gerar a key da Aplicação

```sh
php artisan key:generate
```

**Free Software, Hell Yeah!**
