=======
# funchealt
desafio API em PHP + Laravel 


Acessível no Heroku  por meio da URL [https://funchealth.herokuapp.com/graphql-playground](https://funchealth.herokuapp.com/graphql-playground)

### Endpoints
Heroku: http://funchealth.herokuapp.com/graphql

Local: http://localhost:8000/graphql

# Doc

```
Exemplo do .env.example (renomear para .env)
```

Assim que os containers estiverem rodando, utilize o seguinte comando para executar as migrations

```
docker-compose exec app php artisan migrate
```
O app será levantado na seguinte url: http://localhost:8000

Execute o seguinte comando para rodar os testes:

```
docker-compose exec app vendor/bin/phpunit
```
