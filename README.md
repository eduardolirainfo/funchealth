=======

# FuncHealth

desafio API em PHP + Laravel

Acessível no Heroku por meio da [URL](http://funchealth.herokuapp.com/graphql-playground)

Laravel: [http://funchealth.herokuapp.com](http://funchealth.herokuapp.com)

Testando a Api GraphQL: [htts://funchealth.herokuapp.com/graphql-playground](http://funchealth.herokuapp.com/graphql-playground)

### Endpoints

Heroku: http://funchealth.herokuapp.com/graphql

Local: http://localhost:8000/graphql

##Doc

Salvar cópia do arquivo .env.example como .env

```
cp .env.example .env
```

Para subir o docker

```
docker-compose up
```

Execute a migração

```
docker-compose exec app php artisan migrate
```

url local: http://localhost:8000

Testes:

```
docker-compose exec app vendor/bin/phpunit
```

Em um ambiente PHP local

Executando:

```
php artisan serve
```

A migrate

```
php artisan migrate
```

Teste:

```
vendor/bin/phpunit
```
