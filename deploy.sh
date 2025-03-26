echo 'Prepare config files...'
cp .env.example .env

echo 'Generate key...'
php artisan key:generate

echo 'Building containers...'
docker compose build --no-cache
docker compose up -d
