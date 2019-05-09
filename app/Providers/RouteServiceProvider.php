<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

///////////
//FACADES
///////////
use Cache;
//////////////
//MODELS
//////////////
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Video;
use App\Models\Blog\File;
use App\Models\Blog\Image;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::model('category', Category::class);
        Route::bind('post', function($value){               
          $minutes = config('custom.cache.time_duration_in_post');     
          $post = Cache::remember($value, $minutes, function() use($value){ 

            if(!auth()->check()){
              $post =  Post::where('slug', $value)
                        ->where('status', 'public')
                        ->with('videos', 'comments', 'images', 'files', 'posts', 'postsBelongs', 'hasCategory', 'comments.parentComment', 'category.post')                       
                        ->first();  
            }else{
              $post =  Post::where('slug', $value)                        
                        ->with('videos', 'comments', 'images', 'files', 'posts', 'postsBelongs', 'hasCategory', 'comments.parentComment', 'category.post')                       
                        ->first();
            }
            
            return $post;
          });

          /*$post = Cache::tags(['Post'])->remember($value, 10080, function() use($value){
            $post =  Post::where('slug', $value)
                        ->where('status', 'public')
                        ->first();
          });*/
          if($post)
          return $post;

          return abort(404);
        });
        Route::model('editingPost', Post::class);
        Route::model('video', Video::class);
        Route::model('file', File::class);
        Route::model('image', Image::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
