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

<!-- PASSAGGI PER GOOGLE API USER STORY 7  DA PAG. 89-->
- andare nella dashboard nella prima lezione del progetto finale e scaricare il file json google credential
- inserire il file nella root del progetto 
- rinominare il file il google_credential.json

- PER WINDOWS - per evitare l’errore certificato SSL:
recarsi al sito "curl - Extract CA Certs from Mozilla" e scaricare il primo file:

Spostare il file nella cartella di php
Recarsi in php.ini e modificare la riga ricordandosi di togliere il ;
1 curl.cainfo = 'percorso/del/file/nella/vostra/cartella/php/'

- lanciare il comando npm i bootstrap-icons
