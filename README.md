# Transactions App

### Prerequisites

- [Docker](https://docs.docker.com/install/)
- [Docker Compose](https://docs.docker.com/compose/)

## Running

```
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

npm install
npm run dev

//Start consumer
docker-compose exec app php artisan queue:listen --queue=pending-transactions
```

Now it's running on http://localhost:8080.

You can use `user.teste@teste.com` and `password` to login with the test user.

## Running the tests

This application use [PHPUnit](https://github.com/sebastianbergmann/phpunit) to run the unit tests.

```
docker-compose exec app composer code:test
```

## Running the code analysis

This application use [Larastan](https://github.com/nunomaduro/larastan) to run the code analysis.

```
docker-compose exec app composer code:analyze
```

## Running the code sniffer

This application use [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) to verify the PHP code standards.

```
docker-compose exec app composer code:sniffer
```

Run `code:sniffer:fix` to fix the errors automaticaly.

## Built With

* [Laravel 6](https://laravel.com/) - PHP Framework
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* [MySQL](https://www.mysql.com/) - Relational database management system
* [RabbitMQ](https://www.rabbitmq.com/) - Message broker
