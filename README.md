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
