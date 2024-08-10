# Makefile
up: env JWTAuth build migrate

env:
	cp .env.example .env
JWTAuth:
	php artisan jwt:secret
build:
	docker compose -f deploy/docker-compose.yml --env-file ./.env up --build
migrate:
	docker exec -t laravelapp php artisan migrate
