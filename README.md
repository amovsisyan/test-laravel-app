<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

As you can see this is app written using Laravel framework.

Steps to start
- First copy .env.example and have your .env file, change and configure for your local environment. (DB, app_url ...)
- run composer install and pull all related dependencies.
- run {sudo} php artisan key:generate
- run {sudo} php artisan config:cache
- run {sudo} php artisan storage:link
- run php artisan migrate
- run php artisan serve and you will have your application opened on some of your local ports (by default http://127.0.0.1:8000/)

This is api server and does not contain any view/UI.
To look all supported api's simply run php artisan route:list
