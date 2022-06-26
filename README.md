# l8ecom
## Laravel 8 E-Commerce Project

#requirement php 7.5.3 or above  mysql node.js git 

install laravel 8 using composer 
write this command in cmd 


run 
composer create-project --prefer-dist laravel/laravel:^8.5 l8ecom

run this command in cmd

cd l8ecom




Clone Repsoitory write bellow command 

git clone https://github.com/talhahjan/l8ecom.git



rename example.env to .env // dont forget to configurate you db credentials in .env file 

run 
composer require laravel/ui


run 
php artisan ui bootstrap --auth

run
composer require laravel/socialite


run
php artisan migrate:fresh --seed


run
php artisan cache:clear

run
composer dump-autoload

open phpmyadmin and import dummy data for product put file from 

l8ecom/database/product.sql


browse 



