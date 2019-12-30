#!/bin/bash

docker-compose exec app composer install
docker-compose exec app composer require laravel/ui
docker-compose exec app npm install --no-bin-links
docker-compose exec app cp .env.example .env
docker-compose exec app php artisan ui vu --auth
docker-compose exec app php artisan migrate
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan optimize
docker-compose exec app php artisan migrate --seed
docker-compose exec app php artisan make:controller MyController
