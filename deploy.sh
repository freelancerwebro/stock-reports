cp .env.example .env

php artisan key:generate

docker compose build --no-cache
docker compose up -d

