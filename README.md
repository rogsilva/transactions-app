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
```

Now it's running on http://localhost:8080.


## Built With

* [Laravel 6](https://laravel.com/) - PHP Framework
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* [MySQL](https://www.mysql.com/) - Relational database management system
* [RabbitMQ](https://www.rabbitmq.com/) - Message broker
