# laravel-docs-by-ajay
Hi there, this is easy Laravel docs with small code snippets which is very helpful to understand whole syntax of Laravel :)

## Pull full project from github.
```
1) composer install
2) setup .env
3) php artisan key:generate
4) php artisan serve
```

## Clear cache
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

## Important commands
```
- composer dump-autoload -> It just regenerates the list of all classes that need to be included in the project.
- php artisan make:model post  -mcrf -> To create model with migration + controller + resource + factory.
- php artisan route:list -> To show all routes in api.php.
- php artisan migrate -> create migrations.
- php artisan migrate:fresh --seed -> To create fresh migrate with seeds.
```

## Work on laravel-api
```
/* post example  */
Route::apiResource('posts', 'PostController');
```

## Add cors support to laravel
```
/* cors origin  */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Authorization ");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE");
```

## Work on Factories
```
<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text,
        'image' => $faker->text,
        'category' => $faker->word,
        'category_id' => function () {
            return \App\Category::all()->random();
        },
        'user_id' => function () {
            return \App\User::all()->random();
        }
    ];
});
```

## Some common errors
```
/* Specified key was too long error */
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```
