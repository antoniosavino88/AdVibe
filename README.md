COMANDI PER INSTALLARE SCOUT:
composer i
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
composer require teamtnt/laravel-scout-tntsearch-driver
copiare dal  .env.example  in .env SCOUT_DRIVER=tntsearch
php artisan scout:flush "App\Models\Ad"
php artisan scout:import "App\Models\Ad"
php artisan scout:status



<!-- comandi pacchetto outhebox/blade-flags  -->

1- composer require outhebox/blade-flags
2- php artisan vendor:publish --tag=blade-flags --force
