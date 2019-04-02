<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*-------------------------
! MODELS
--------------------------*/
use App\Models\Blog\Post;

class SitemapController extends Controller
{
  public function sitemap()
  {
    	// create new sitemap object
    $sitemap = \App::make("sitemap");

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled
    $sitemap->setCache('laravel.sitemap', 3600);

    // check if there is cached sitemap and build new only if is not
    if (!$sitemap->isCached())
    {
       // get all posts from db, with image relations
      $posts = Post::where('status', 'public')
       							->with('images')
       							->orderBy('created_at', 'desc')->get();

      $sitemap->add(route('post.show', 'bienvenidos-a-contabilizalo-com'), \Carbon\Carbon::now(), 1.0, 'daily');	
		$sitemap->add("https://operaciones-entre-regimenes.contabilizalo.com/", \Carbon\Carbon::now(), 1.0, 'daily');	
       // add every post to the sitemap
      foreach ($posts as $post)
      {
          // get all images for the current post
        $images = array();
        foreach ($post->images as $image) {
            $images[] = array(
                  'url' => asset($image->full_path),
                  'title' => $image->alt,
                  'caption' => $image->original_name
            );
        }

        if($post->hasCategory)
        {           
          $sitemap->add(route('post.show', $post), $post->updated_at, 1.0, 'weekly', $images, $post->title);
        }
        else
        {           
          $sitemap->add(route('post.show', $post), $post->updated_at, 0.9, 'weekly', $images, $post->title);
        }          
      }

      /*$files = File::all();
      foreach()
      {

      }*/
    }
    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');
  }
}
