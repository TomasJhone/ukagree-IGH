# ukagree-IGH

Clone the repo
go to root folder
composer install
php artisan config:clear
php artisan cache:clear
php artisan key:generate
php artisan jwt:secret
php artisan storage:link
php artisan migrate:fresh --seed
php artisan serve
Open the browser at http://localhost:8000/
the installer will run (if the file is not present in 'storage/installed')
