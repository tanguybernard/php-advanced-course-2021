# PHP avancé


## Install

docker-compose up -d


## Using

### Basic API (Pure PHP)

http://localhost:8080/api 

#### Get movies

GET: http://localhost:8080/api/v1/movies

#### Post movie

POST: http://localhost:8080/api/v1/movies

    {
    "id":5,
    "movie": "Titanic"
    }

### Slim Api

http://localhost:8080/slimapi

Get Movies from Mock

http://localhost:8080/slimapi/v1/mocked/movies


## Swagger

http://localhost:8080/swagger-ui/

## Test

    php vendor/bin/phpunit tests


## Postgresql

psql -upostgres testdbcourse

Creation produits

    php doctrine_create_product.php MonSuperProduit

Récupération produits

    doctrine_get_product.php


## Credits

### General

https://marcit.eu/en/2021/04/28/dockerize-webserver-nginx-php8/

http://coreymaynard.com/blog/creating-a-restful-api-with-php/

### Mock

https://www.stevenrombauts.be/2018/03/mock-api-requests-in-codeception-acceptance-tests/

### Slim Framework

https://akrabat.com/running-slim-4-in-a-subdirectory/

### Github Actions

https://blog.dayo.fr/2020/11/utiliser-les-github-actions-pour-php/