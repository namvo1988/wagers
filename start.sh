#!/bin/bash

# command for start
#Composer install

php artisan migrate
php artisan passport:install
php artisan db:seed


$SHELL 