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
- php artisan migrate -> migrate the all migrations
- php artisan migrate:fresh --seed -> fresh migrate with seeds.
- php artisan make:resource User -> To create resource
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

## Important tips
```
- When you change the .env file then don't forget to recompile server.
```

## Work on ApiResources
```
/** Post Resource**/
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Category;
use Carbon\Carbon;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Category as CategoryResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $Created_at = Carbon::parse($this->created_at)->diffForHumans();
        $Updated_at = Carbon::parse($this->updated_at)->diffForHumans();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->body,
            'image' => $this->image,
            // 'user' => auth()->guard('api')->user()->name,
            'user' =>  new UserResource($this->user),
            'created_at' =>  $Created_at,
            'updated_at' => $Updated_at,
        ];
    }
}


/** User resouce **/
<?php

namespace App\Http\Resources;

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon; 
use App\Http\Resources\Post as PostResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $Created_at = Carbon::parse($this->created_at)->diffForHumans();
        $Updated_at = Carbon::parse($this->updated_at)->diffForHumans();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $Created_at,
            'updated_at' => $Updated_at,
        ];
    }
}
```
+ [Learn more](https://github.com/ajaymarathe/bootcatch-blogging-api-routes-laravel/tree/master/app/Http/Resources)

## Deploy Laravel project to cpanel

- Make zip of all your project
- Upload it on server
- Unzip it
- Hit following commmands
```
- composer dump-autoload
- composer install or composer update
- php artisan config:cache
```
- check if it is working or not, if still not then maybe it's file permission issue go to `public/index.php` and chaged file permission `644`.
- got this error `Declaration of Symfony\Component\Translation\TranslatorInterface::setLocale($locale) must be compatible with Symfony\Contracts\Translation\LocaleAwareInterface::setLocale(string $locale)`
 then simply add this ` "symfony/translation": "4.3.8" ` in your `composer.json` and hit `composer update` command.
- hope this helps.

