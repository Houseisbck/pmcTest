# Makefile
up: package config JWTAuth build migrate

package:
    composer install
JWTAuth:
    php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
    php artisan jwt:secret
build:
	docker compose -f deploy/docker-compose.yml --env-file ./.env up --build
migrate:
	docker exec -t laravelapp php artisan migrate
