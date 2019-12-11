# laravel-docs-by-ajay
Hi there, this is easy Laravel docs with small code snippets which is very helpful to understand whole syntax of Laravel :)

## pull full project from github.
```
1) composer install
2) setup .env
3) php artisan key:generate
4) php artisan serve
```

## clear cache
```
php artisan config:cache
php artisan clear:cache
```

## Debug in laravel
```
1) dd();
2) echo "<pre>";print_r($var);exit;
3) echo $var;exit;
4) return $request->all();
```

## important commands
```
- composer dump-autoload -> It just regenerates the list of all classes that need to be included in the project.
- php artisan make:model post  -mcrf -> To create model with migration + controller + resource + factory.
- php artisan route:list -> To show all routes in api.php
```

## work on laravel-api

## Add cors support to laravel
```
/* cors origin  */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Authorization ");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE");
```
