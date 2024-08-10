docker compose -f deploy/docker-compose.yml --env-file ./.env up --build
docker exec -t laravelapp php artisan migrate
