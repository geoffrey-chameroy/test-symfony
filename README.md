## Installation

The easiest way to install this application is by using [Docker](https://www.docker.com/)
```bash
$> cp docker-compose.override.yml.dist docker-compose.override.yml
$> docker-compose up -d
```

After that you'll have to install dependencies and database with fixtures
```bash
$> docker-compose exec app composer install
$> docker-compose exec app php app/console doctrine:schema:create
$> docker-compose exec app php app/console doctrine:fixtures:load -n
```

### Testing

Use PHPUnit to run functional and unit tests
```bash
$> docker-compose exec app bin/simple-phpunit -c app
```
