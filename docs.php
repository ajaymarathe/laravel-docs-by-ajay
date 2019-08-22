<?php 

##pull full project from github.
1) composer install
2) setup .env
3) php artisan key:generate
4) php artisan serve

## clear cache
php artisan config:cache
php artisan clear:cache

## Debug in laravel
1) dd();
2) echo "<pre>";print_r($var);exit;
3) echo $var;exit;
4) return $request->all();