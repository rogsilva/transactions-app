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

## Built With

* [Laravel 6](https://laravel.com/) - PHP Framework
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* [MySQL](https://www.mysql.com/) - Relational database management system
* [RabbitMQ](https://www.rabbitmq.com/) - Message broker
