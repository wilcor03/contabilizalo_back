<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cache;
/*--------------------------
!MODELS
----------------------------*/
use App\Models\Blog\Post;
use App\Models\Blog\Comment;

class UserController extends Controller
{
  public function dashboard()
  {
  	return view('user.dashboard');
  }

  public function home()
  {
  	$slug = 'bienvenidos-a-contabilizalo-com';
  	$post = Cache::remember($slug, 1440, function() use($slug){
      return Post::where('slug', $slug)->with('comments', 'comments.parentComment')->first();
    });

    /*Cache::tags(['Post'])->rememberForever($slug, function() use($slug){
  		return*/ //Post::where('slug', $slug)->first();
  	//});

  	//$comments = /*Cache::tags(['Post','Comment'])->remember($slug, 2880, function()use($post){
  		//return*/ $post->comments;
  	//});

  	return view('home', compact('post'));
  }
}
