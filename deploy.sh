echo 'Prepare config files...'
cp .env.example .env

echo 'Generate key...'
php artisan key:generate

echo 'Clear log file...'
truncate -s 0 storage/logs/laravel.log

echo 'Building containers...'
docker compose build
docker compose up -d
