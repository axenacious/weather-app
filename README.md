## Steps to run

 - copy .env.example file and change name to .env
 - change the GOOGLE_MAP_KEY to use your own google key (https://console.cloud.google.com/apis/credentials)
 - run php artisan key:generate
 - run php artisan config:cache
 - run php artisan config:clear
 - run php artisan serve
 - access the url from the logs.
