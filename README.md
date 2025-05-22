Tutor install

composer install

npm install chart.js
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p

copy .env

edit .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=a
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve
